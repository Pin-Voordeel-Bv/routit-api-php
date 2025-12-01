<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Request\Header;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\NewFiberRequestData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewFiberOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'NewFiberOrderRequest_V2';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('CustomerId')]
    private ?int $customerId = null;

    #[SerializedName('ProductId')]
    private ?string $productId = null;

    #[SerializedName('FiberRequestData')]
    private ?NewFiberRequestData $fiberRequestData = null;

    /**
     * getHeader
     * @return Header|null
     */
    public function getHeader(): ?Header
    {
        return $this->header;
    }

    /**
     * setHeader
     * @param mixed $header
     * @return NewFiberOrderRequest
     */
    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * getCustomerId
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * setCustomerId
     * @param mixed $customerId
     * @return NewFiberOrderRequest
     */
    public function setCustomerId(?int $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * getProductId
     * @return string|null
     */
    public function getProductId(): ?string
    {
        return $this->productId;
    }

    /**
     * setProductId
     * @param mixed $productId
     * @return NewFiberOrderRequest
     */
    public function setProductId(?string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return NewFiberRequestData|null
     */
    public function getFiberRequestData(): ?NewFiberRequestData
    {
        return $this->fiberRequestData;
    }

    /**
     * @param mixed $fiberRequestData
     * @return NewFiberOrderRequest
     */
    public function setFiberRequestData(?NewFiberRequestData $fiberRequestData): self
    {
        $this->fiberRequestData = $fiberRequestData;
        return $this;
    }
}
