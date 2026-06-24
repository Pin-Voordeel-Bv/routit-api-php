<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Validation\Validator;
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

    public function validate(): void
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['header', 'orderId', 'productCode'], $errors);

        // orderId must be a non-empty string matching pattern: OID followed by digits
        Validator::assertInitializedStringMatchingPattern(
            $this,
            'orderId',
            '/^OID[0-9]+$/',
            'OrderId',
            $errors
        );

        Validator::assertStringPropertyLength($this, 'productCode', 1, null, 'ProductCode', $errors);

        Validator::assertOptionalStringLength($this->label ?? null, null, 255, 'Label', $errors); // maxLength was not defined; assuming generous

        Validator::throwIfErrors($errors);
    }

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
        $this->orderId = $orderId;
        return $this;
    }

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): self
    {
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