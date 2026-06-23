<?php

namespace Inserve\RoutITAPI;

use GuzzleHttp\Client;
use Inserve\RoutITAPI\Client\APIClient;
use Inserve\RoutITAPI\Exception\RoutITAPIException;
use Inserve\RoutITAPI\Request\CustomerDataRequest;
use Inserve\RoutITAPI\Request\DeactivateCustomerRequest;
use Inserve\RoutITAPI\Request\FtthLineTestRequest;
use Inserve\RoutITAPI\Request\LineCheckRequest;
use Inserve\RoutITAPI\Request\LineDiagnoseRequest;
use Inserve\RoutITAPI\Request\MigrateDslOrderRequest;
use Inserve\RoutITAPI\Request\ModifyCustomerRequest;
use Inserve\RoutITAPI\Request\ModifyDslOrderRequest;
use Inserve\RoutITAPI\Request\ModifyFiberOrderRequest;
use Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;
use Inserve\RoutITAPI\Request\NewCustomerRequest;
use Inserve\RoutITAPI\Request\NewDslOrderRequest;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest;
use Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest;
use Inserve\RoutITAPI\Request\OrderSummaryRequest;
use Inserve\RoutITAPI\Request\ProductPriceDetailsRequest;
use Inserve\RoutITAPI\Request\RePlanDslOrderRequest;
use Inserve\RoutITAPI\Request\TerminateOrderRequest;
use Inserve\RoutITAPI\Request\UpgradeDslOrderRequest;
use Inserve\RoutITAPI\Request\UpgradeOrderRequest;
use Inserve\RoutITAPI\Request\RoutITRequestInterface;
use Inserve\RoutITAPI\Request\ZipCodeCheckRequest;
use Inserve\RoutITAPI\Response\CustomerDataResponse;
use Inserve\RoutITAPI\Response\DeactivateCustomerResponse;
use Inserve\RoutITAPI\Response\DslOrderData;
use Inserve\RoutITAPI\Response\DslOrderUpdate;
use Inserve\RoutITAPI\Response\FiberOrderResponse;
use Inserve\RoutITAPI\Response\FtthLineTestResponse;
use Inserve\RoutITAPI\Response\LineCheckResponse;
use Inserve\RoutITAPI\Response\MigrateDslOrderResponse;
use Inserve\RoutITAPI\Response\ModifyCustomerResponse;
use Inserve\RoutITAPI\Response\NewCustomerResponse;
use Inserve\RoutITAPI\Response\NewDslOrderResponse;
use Inserve\RoutITAPI\Response\NinaResponse;
use Inserve\RoutITAPI\Response\OrderSummaryResponse;
use Inserve\RoutITAPI\Response\ProductPriceDetailsResponse;
use Inserve\RoutITAPI\Response\RePlanDslOrderResponse;
use Inserve\RoutITAPI\Request\TerminateOrderResponse;
use Inserve\RoutITAPI\Response\UpgradeDslOrderResponse;
use Inserve\RoutITAPI\Response\UpgradeOrderResponse;
use Inserve\RoutITAPI\Response\VlanFiberOrderResponse;
use Inserve\RoutITAPI\Response\ZipCodeCheckResponse;
use Psr\Log\LoggerInterface;
use SensitiveParameter;

/**
 *
 */
final class RoutITAPIClient
{
    protected APIClient $apiClient;

    /**
     * @param APIClient|null       $apiClient
     * @param LoggerInterface|null $logger
     * @param string|null          $baseUri
     */
    public function __construct(?APIClient $apiClient = null, ?LoggerInterface $logger = null, ?string $baseUri = null)
    {
        if (! $apiClient) {
            $apiClient = new APIClient(
                new Client(is_string($baseUri) ? ['base_uri' => $baseUri] : [])
            );
        }

        if ($logger) {
            $apiClient->setLogger($logger);
        }

        $this->apiClient = $apiClient;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $apiUrl
     *
     * @return $this
     */
    public function configure(string $username, #[SensitiveParameter] string $password, string $apiUrl): self
    {
        $this->apiClient
            ->setCredentials($username, $password)
            ->setApiUrl($apiUrl);

        return $this;
    }

    /**
     * @param CustomerDataRequest|null $request
     *
     * @return CustomerDataResponse|null
     * @throws RoutITAPIException
     */
    public function customerData(?CustomerDataRequest $request = null): ?CustomerDataResponse
    {
        /** @var CustomerDataResponse|null */
        return $this->apiCallWithEndpoint($request ?? new CustomerDataRequest(), CustomerDataResponse::class);
    }

    /**
     * @throws RoutITAPIException
     */
    public function orderSummary(?OrderSummaryRequest $request = null): ?OrderSummaryResponse
    {
        /** @var OrderSummaryResponse|null */
        return $this->apiCallWithEndpoint($request ?? new OrderSummaryRequest(), OrderSummaryResponse::class);
    }

    /**
     * @return ProductPriceDetailsResponse|null
     *
     * @throws RoutITAPIException
     */
    public function productPriceDetails(): ?ProductPriceDetailsResponse
    {
        /** @var ProductPriceDetailsResponse|null */
        return $this->apiCallWithEndpoint(new ProductPriceDetailsRequest(), ProductPriceDetailsResponse::class);
    }

    /**
     * @param ZipCodeCheckRequest|null $request
     *
     * @return ZipCodeCheckResponse|null
     * @throws RoutITAPIException
     */
    public function zipCodeCheck(?ZipCodeCheckRequest $request = null): ?ZipCodeCheckResponse
    {
        /** @var ZipCodeCheckResponse|null */
        return $this->apiCallWithEndpoint($request ?? new ZipCodeCheckRequest(), ZipCodeCheckResponse::class);
    }

    /**
     * @param NewCustomerRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function newCustomer(?NewCustomerRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new NewCustomerRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param ModifyCustomerRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function modifyCustomer(?ModifyCustomerRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new ModifyCustomerRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param DeactivateCustomerRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function deactivateCustomer(?DeactivateCustomerRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new DeactivateCustomerRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param NewFiberOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function newFiberOrder(?NewFiberOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new NewFiberOrderRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    public function modifyFiberOrder(?ModifyFiberOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new ModifyFiberOrderRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param NewVlanFiberOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function newVlanFiberOrder(?NewVlanFiberOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new NewVlanFiberOrderRequest();

        return $this->apiCallQueued($request);
    }

    public function modifyVlanFiber(?ModifyVlanFiberRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new ModifyVlanFiberRequest();

        return $this->apiCallQueued($request);
    }

    /**
     * @param NewDslOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function newDslOrder(?NewDslOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new NewDslOrderRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param ModifyDslOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function modifyDslOrder(?ModifyDslOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new ModifyDslOrderRequest();

        return $this->apiCallQueued($request);
    }

    /**
     * @param MigrateDslOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function migrateDslOrder(?MigrateDslOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new MigrateDslOrderRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param RePlanDslOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function rePlanDslOrder(?RePlanDslOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new RePlanDslOrderRequest();

        return $this->apiCallQueued($request);
    }

    /**
     * @param UpgradeDslOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function upgradeDslOrder(?UpgradeDslOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new UpgradeDslOrderRequest();

        return $this->apiCallQueued($request);
    }

    /**
     * @param UpgradeOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function upgradeOrder(?UpgradeOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new UpgradeOrderRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param FtthLineTestRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function ftthLineTest(?FtthLineTestRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new FtthLineTestRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param LineCheckRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function lineCheck(?LineCheckRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new LineCheckRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param LineDiagnoseRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function lineDiagnose(?LineDiagnoseRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new LineDiagnoseRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param TerminateOrderRequest|null $request
     *
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    public function terminateOrder(?TerminateOrderRequest $request = null): ?NinaResponse
    {
        $request = $request ?? new TerminateOrderRequest();
        $request->validate();

        return $this->apiCallQueued($request);
    }

    /**
     * @param RoutITRequestInterface $request
     * @param string                 $responseClass
     * @param string                 $endpoint
     *
     * @return mixed
     *
     * @throws RoutITAPIException
     */
    protected function apiCallWithEndpoint(
        RoutITRequestInterface $request,
        string $responseClass,
        string $endpoint = '/realtime'
    ): mixed {
        $rawBody = $this->apiClient->request($request, $endpoint);

        // If response is already the correct type, just return it
        if ($rawBody instanceof $responseClass) {
            return $rawBody;
        }

        // Only if it's a string do we proceed with deserialization logic
        if ($responseClass === NinaResponse::class && is_string($rawBody)) {
            if (str_contains($rawBody, APIClient::XML_ERROR_RESPONSE_TAG)) {
                $nina = $this->apiClient->deserialize($rawBody, NinaResponse::class);

                if (!$nina->isSuccess || $nina->errorCode !== 0) {
                    throw new RoutITAPIException(
                        (string) ($nina->errorMessage ?? 'Unknown NinaResponse error'),
                        $nina->errorCode ?? 0,
                        null,
                        $nina->getErrorDetails()
                    );
                }

                return $nina;
            }
        }

        // Final fallback: try to deserialize into expected response class
        if (is_string($rawBody)) {
            return $this->apiClient->deserialize($rawBody, $responseClass);
        }

        // This is a serious unexpected case
        // throw new \UnexpectedValueException("Unexpected response type: " . gettype($rawBody));
        throw new \UnexpectedValueException(sprintf(
            "Unexpected response type: %s, expected: %s, actual class: %s",
            gettype($rawBody),
            $responseClass,
            get_class($rawBody)
        ));
    }

    /**
     * Sends a queued request and returns a NinaResponse
     *
     * @param object $request
     * @return NinaResponse|null
     * @throws RoutITAPIException
     */
    protected function apiCallQueued(object $request): ?NinaResponse
    {
         try {
             /** @var NinaResponse */
            return $this->apiCallWithEndpoint($request, NinaResponse::class, "/queued");
        } catch (RoutITAPIException $e) {
            // Re-throw to preserve type correctness
            throw $e;
         }
    }
}