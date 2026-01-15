<?php

namespace Inserve\RoutITAPI\Client;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Inserve\RoutITAPI\Exception\RoutITAPIException;
use Inserve\RoutITAPI\Request\MigrateDslOrderRequest;
use Inserve\RoutITAPI\Request\NewDslOrderRequest;
use Inserve\RoutITAPI\Request\RoutITRequestInterface;
use Inserve\RoutITAPI\Response\ErrorResponse;
use Psr\Log\LoggerAwareTrait;
use SensitiveParameter;
use Symfony\Component\PropertyAccess\Exception\UnexpectedTypeException;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *
 */
final class APIClient
{
    use LoggerAwareTrait;

    protected const XML_ERROR_RESPONSE_TAG = 'NinaResponse';

    protected Serializer $serializer;
    protected ObjectNormalizer $normalizer;
    protected ?string $basicAuthentication = null;
    protected string $apiUrl = '';

    /**
     * @param ClientInterface $client
     */
    public function __construct(protected ClientInterface $client)
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $extractor = new PropertyInfoExtractor(
            typeExtractors: [
                new PhpDocExtractor(),
                new ReflectionExtractor(),
            ]
        );
        $this->normalizer = new ObjectNormalizer(
            classMetadataFactory: $classMetadataFactory,
            nameConverter: new MetadataAwareNameConverter($classMetadataFactory),
            propertyTypeExtractor: $extractor,
            defaultContext: [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
                AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
            ]
        );

        $this->serializer = new Serializer(
            [$this->normalizer, new ArrayDenormalizer()],
            [new XmlEncoder()]
        );
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return $this
     */
    public function setCredentials(string $username, #[SensitiveParameter] string $password): self
    {
        $this->basicAuthentication = base64_encode(sprintf('%s:%s', $username, $password));

        return $this;
    }

    /**
     * @param string $url
     *
     * @return self
     */
    public function setApiUrl(string $url): self
    {
        $this->apiUrl = $url;

        return $this;
    }

    /**
     * @param RoutITRequestInterface $request
     *
     * @return string
     *
     * @throws RoutITAPIException
     */
    public function request(RoutITRequestInterface $request, string $endpoint = '/realtime'): string
    {
        $apiRequest = new Request(
            method: 'POST',
            uri: $this->getApiUrl($endpoint),
            headers: $this->getDefaultHeaders(),
            body: $this->serializeRequest($request)
        );

        // Tune these once and you're done
        $options = [
            // total time allowed for the whole request (DNS+connect+TLS+request+response)
            'timeout' => 25.0,

            // time allowed to establish TCP + TLS
            'connect_timeout' => 8.0,

            // don't throw exceptions on 4xx/5xx automatically
            'http_errors' => false,

            // keep TLS verification on
            'verify' => true,
        ];

        $t0 = microtime(true);

        try {
            $response = $this->client->send($apiRequest, $options);
            $body = (string) $response->getBody();

            $ms = (int) round((microtime(true) - $t0) * 1000);
            $this->logError(sprintf('[RoutIT] %s %s -> HTTP %s in %dms', 'POST', $endpoint, $response->getStatusCode(), $ms));

            // Still treat NinaResponse as an application error (XML payload)
            if (str_contains($body, self::XML_ERROR_RESPONSE_TAG)) {
                /** @var ErrorResponse|null $errorResponse */
                $errorResponse = $this->deserialize($body, ErrorResponse::class);

                throw new RoutITAPIException(
                    (string) ($errorResponse?->getErrorMessage() ?? 'Unknown NinaResponse error'),
                    (int) ($errorResponse?->getErrorCode() ?? 0)
                );
            }

            // If upstream returned HTML (e.g., 500 gateway page), fail cleanly
            if ($body !== '' && $body[0] === '<' && str_contains($body, '<html')) {
                throw new RoutITAPIException('Upstream returned HTML instead of XML', 502);
            }

            return $body;
        } catch (ConnectException $e) {
            // Typical for connect timeout / DNS issues / TLS connect stalls
            $ms = (int) round((microtime(true) - $t0) * 1000);
            $this->logError(sprintf('[RoutIT] CONNECT FAIL %s in %dms: %s', $endpoint, $ms, $e->getMessage()));

            throw new RoutITAPIException('Upstream connect timeout / connection error', 504);
        } catch (RequestException $e) {
            // This is where timeouts often land, depending on handler
            $ms = (int) round((microtime(true) - $t0) * 1000);
            $msg = $e->getMessage();

            $this->logError(sprintf('[RoutIT] REQUEST FAIL %s in %dms: %s', $endpoint, $ms, $msg));

            // crude but effective: detect timeout wording across curl/handlers
            $isTimeout =
                str_contains(strtolower($msg), 'timed out') ||
                str_contains(strtolower($msg), 'timeout') ||
                str_contains(strtolower($msg), 'operation timed out');

            if ($isTimeout) {
                throw new RoutITAPIException('Upstream request timeout', 504);
            }

            throw new RoutITAPIException($msg, (int) $e->getCode());
        } catch (GuzzleException|BadResponseException $e) {
            $ms = (int) round((microtime(true) - $t0) * 1000);
            $this->logError(sprintf('[RoutIT] GUZZLE FAIL %s in %dms: %s', $endpoint, $ms, $e->getMessage()));

            throw new RoutITAPIException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * @param string $response
     * @param string $class
     *
     * @return mixed
     */
    public function deserialize(string $response, string $class): mixed
    {
        try {
            return $this->serializer->deserialize($response, $class, XmlEncoder::FORMAT);
        } catch (Exception $exception) {
            if (!$exception instanceof UnexpectedTypeException) {
                $this->logError(sprintf('(%s): %s', __FUNCTION__, $exception->getMessage()));
            }

            return null;
        }
    }

    /**
     * @param RoutITRequestInterface $request
     *
     * @return string
     */
    protected function serializeRequest(RoutITRequestInterface $request): string
    {
        // 🔹 Special-case NewDslOrderRequest to remove phantom "complexAddress"
        if ($request instanceof NewDslOrderRequest) {
            // First let the normalizer build the data
            $normalized = $this->normalizer->normalize($request);

            // Debug if you like:
            // var_dump(array_keys($normalized));

            // ❌ Remove the unwanted key
            unset($normalized['complexAddress']);

            // Now encode the already-normalized array to XML
            return $this->serializer->encode(
                $normalized,
                XmlEncoder::FORMAT,
                [
                    XmlEncoder::ROOT_NODE_NAME => $request->getRootNode(),
                    XmlEncoder::ENCODER_IGNORED_NODE_TYPES => [XML_PI_NODE],
                ]
            );
        }
        if ($request instanceof MigrateDslOrderRequest) {
            $normalized = $this->normalizer->normalize($request);
            unset($normalized['realtime']);
            return $this->serializer->encode(
                $normalized,
                XmlEncoder::FORMAT,
                [
                    XmlEncoder::ROOT_NODE_NAME => $request->getRootNode(),
                    XmlEncoder::ENCODER_IGNORED_NODE_TYPES => [XML_PI_NODE],
                ]
            );
        }

        return $this->serializer->serialize(
            $request,
            XmlEncoder::FORMAT,
            [
                XmlEncoder::ROOT_NODE_NAME => $request->getRootNode(),
                XmlEncoder::ENCODER_IGNORED_NODE_TYPES => [XML_PI_NODE],
            ]
        );
    }

    /**
     * @param string $url
     *
     * @return string
     */
    protected function getApiUrl(string $url): string
    {
        return sprintf('/%s%s', $this->apiUrl, $url);
    }

    /**
     * @return string[]
     */
    protected function getDefaultHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/xml',
        ];

        if ($this->basicAuthentication !== null) {
            $headers['Authorization'] = sprintf('Basic %s', $this->basicAuthentication);
        }

        return $headers;
    }

    /**
     * @param string $message
     *
     * @return void
     */
    private function logError(string $message): void
    {
        if (!$this->logger) {
            return;
        }

        $this->logger->error($message);
    }
}
