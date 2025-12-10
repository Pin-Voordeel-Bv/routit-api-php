<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\FiberAccessData;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\FiberMigrationData;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\NewFiberRequestData;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\NewVlanFiberRequestData;
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

    #[SerializedName('FirstNewVlan')]
    private ?NewVlanFiberRequestData $firstNewVlan = null;

    #[SerializedName('FiberMigrationData')]
    private ?FiberMigrationData $fiberMigrationData = null;

    #[SerializedName('FiberAccessData')]
    private ?FiberAccessData $fiberAccessData = null;

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

    public function getFirstNewVlan(): ?NewVlanFiberRequestData
    {
        return $this->firstNewVlan;
    }

    public function setFirstNewVlan(?NewVlanFiberRequestData $firstNewVlan): self
    {
        $this->firstNewVlan = $firstNewVlan;
        return $this;
    }
    public function getFiberMigrationData(): ?FiberMigrationData
    {
        return $this->fiberMigrationData;
    }

    public function setFiberMigrationData(?FiberMigrationData $fiberMigrationData): self
    {
        $this->fiberMigrationData = $fiberMigrationData;
        return $this;
    }

    public function getFiberAccessData(): ?FiberAccessData
    {
        return $this->fiberAccessData;
    }

    public function setFiberAccessData(?FiberAccessData $fiberAccessData): self
    {
        $this->fiberAccessData = $fiberAccessData;
        return $this;
    }
}
