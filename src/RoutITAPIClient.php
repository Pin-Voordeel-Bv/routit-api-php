<?php

namespace Inserve\RoutITAPI;

use GuzzleHttp\Client;
use Inserve\RoutITAPI\Client\APIClient;
use Inserve\RoutITAPI\Exception\RoutITAPIException;
use Inserve\RoutITAPI\Request\CustomerDataRequest;
use Inserve\RoutITAPI\Request\DeactivateCustomerRequest;
use Inserve\RoutITAPI\Request\ModifyCustomerRequest;
use Inserve\RoutITAPI\Request\ModifyDslOrderRequest;
use Inserve\RoutITAPI\Request\ModifyFiberOrderRequest;
use Inserve\RoutITAPI\Request\NewCustomerRequest;
use Inserve\RoutITAPI\Request\NewDslOrderRequest;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest;
use Inserve\RoutITAPI\Request\OrderSummaryRequest;
use Inserve\RoutITAPI\Request\ProductPriceDetailsRequest;
use Inserve\RoutITAPI\Request\RoutITRequestInterface;
use Inserve\RoutITAPI\Request\ZipCodeCheckRequest;
use Inserve\RoutITAPI\Response\CustomerDataResponse;
use Inserve\RoutITAPI\Response\DeactivateCustomerResponse;
use Inserve\RoutITAPI\Response\DslOrderData;
use Inserve\RoutITAPI\Response\DslOrderUpdate;
use Inserve\RoutITAPI\Response\FiberOrderResponse;
use Inserve\RoutITAPI\Response\ModifyCustomerResponse;
use Inserve\RoutITAPI\Response\NewCustomerResponse;
use Inserve\RoutITAPI\Response\OrderSummaryResponse;
use Inserve\RoutITAPI\Response\ProductPriceDetailsResponse;
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
    public function getCustomerData(?CustomerDataRequest $request = null): ?CustomerDataResponse
    {
        /** @var CustomerDataResponse|null */
        return $this->apiCallWithEndpoint($request ?? new CustomerDataRequest(), CustomerDataResponse::class);
    }

    /**
     * @throws RoutITAPIException
     */
    public function getOrderSummary(?OrderSummaryRequest $request = null): ?OrderSummaryResponse
    {
        /** @var OrderSummaryResponse|null */
        return $this->apiCallWithEndpoint($request ?? new OrderSummaryRequest(), OrderSummaryResponse::class);
    }

    /**
     * @return ProductPriceDetailsResponse|null
     *
     * @throws RoutITAPIException
     */
    public function getProductPriceDetails(): ?ProductPriceDetailsResponse
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
     * @return NewCustomerResponse|null
     * @throws RoutITAPIException
     */
    public function newCustomer(?NewCustomerRequest $request = null): ?NewCustomerResponse
    {
        /** @var NewCustomerResponse|null */
        return $this->apiCallWithEndpoint($request ?? new NewCustomerRequest(), NewCustomerResponse::class, "/queued");
    }

    /**
     * @param ModifyCustomerRequest|null $request
     *
     * @return ModifyCustomerResponse|null
     * @throws RoutITAPIException
     */
    public function modifyCustomer(?ModifyCustomerRequest $request = null): ?ModifyCustomerResponse
    {
        /** @var ModifyCustomerResponse|null */
        return $this->apiCallWithEndpoint($request ?? new ModifyCustomerRequest(), ModifyCustomerResponse::class, "/queued");
    }

    /**
     * @param DeactivateCustomerRequest|null $request
     *
     * @return DeactivateCustomerResponse|null
     * @throws RoutITAPIException
     */
    public function deactivateCustomer(?DeactivateCustomerRequest $request = null): ?DeactivateCustomerResponse
    {
        /** @var DeactivateCustomerResponse|null */
        return $this->apiCallWithEndpoint($request ?? new DeactivateCustomerRequest(), DeactivateCustomerResponse::class, "/queued");
    }

    /**
     * @param NewFiberOrderRequest|null $request
     *
     * @return FiberOrderResponse|null
     * @throws RoutITAPIException
     */
    public function newFiberOrder(?NewFiberOrderRequest $request = null): ?FiberOrderResponse
    {
        /** @var NewFiberOrderResponse|null */
        return $this->apiCallWithEndpoint($request ?? new NewFiberOrderRequest(), FiberOrderResponse::class, "/queued");
    }

    public function modifyFiberOrder(?ModifyFiberOrderRequest $request = null): ?FiberOrderResponse
    {
        /** @var FiberOrderResponse|null */
        return $this->apiCallWithEndpoint($request ?? new ModifyFiberOrderRequest(), FiberOrderResponse::class, "/queued");
    }

    /**
     * @param NewDslOrderRequest|null $request
     *
     * @return DslOrderData|null
     * @throws RoutITAPIException
     */
    public function newDslOrder(?NewDslOrderRequest $request = null): ?DslOrderData
    {
        /** @var DslOrderData|null */
        return $this->apiCallWithEndpoint($request ?? new NewDslOrderRequest(), DslOrderData::class, "/queued");
    }

    /**
     * @param ModifyDslOrderRequest|null $request
     *
     * @return DslOrderData|null
     * @throws RoutITAPIException
     */
    public function modifyDslOrder(?ModifyDslOrderRequest $request = null): ?DslOrderData
    {
        /** @var DslOrderData|null */
        return $this->apiCallWithEndpoint($request ?? new ModifyDslOrderRequest(), DslOrderData::class, "/queued");
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
        $response = $this->apiClient->request($request, $endpoint);

        return $this->apiClient->deserialize($response, $responseClass);
    }
}