<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class UpgradeDslOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'UpgradeDslOrderRequest_V2';

    #[SerializedName('Header')]
    private Header $header;

    /**
     * Must match: OID[0-9]+
     * Example: OID123456
     */
    #[SerializedName('OrderId')]
    private string $orderId;

    #[SerializedName('ProductCode')]
    private string $productCode;

    #[SerializedName('Label')]
    private ?string $label = null;

    public function getHeader(): Header
    {
        return $this->header;
    }

    public function setHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        // enforce XSD pattern OID[0-9]+
        if (!preg_match('/^OID[0-9]+$/', $orderId)) {
            throw new \InvalidArgumentException("OrderId must match pattern OID[0-9]+, got: {$orderId}");
        }

        $this->orderId = $orderId;
        return $this;
    }

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): self
    {
        if (trim($productCode) === '') {
            throw new \InvalidArgumentException('ProductCode must have minLength 1.');
        }

        $this->productCode = $productCode;
        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = ($label !== null && $label !== '') ? $label : null;
        return $this;
    }
}