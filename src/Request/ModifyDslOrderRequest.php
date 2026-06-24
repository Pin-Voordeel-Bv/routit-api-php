<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyDslOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'ModifyDslOrderRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('OntSerialNumber')]
    private ?string $ontSerialNumber = null;

    public function validate(): void
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['header', 'orderId'], $errors);

        Validator::assertInitializedInt($this, 'orderId', $errors);

        if (property_exists($this, 'ontSerialNumber') && $this->ontSerialNumber !== null) {
            Validator::assertStringLength($this->ontSerialNumber, null, 12, 'OntSerialNumber', $errors);

            // Strict format check: 4 letters + 8 hex digits
            if (!preg_match('/^[A-Za-z]{4}[0-9A-Fa-f]{8}$/', $this->ontSerialNumber)) {
                $errors[] = "OntSerialNumber must be 4 letters followed by 8 hexadecimal characters (e.g., ALCL653B8B92).";
            }
        }

        Validator::throwIfErrors($errors);
    }

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
     * @return ModifyFiberOrderRequest
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
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * setCustomerId
     * @param mixed $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOntSerialNumber(): ?string
    {
        return $this->ontSerialNumber;
    }

    /**
     * @param string|null $ontSerialNumber
     * @return $this
     */
    public function setOntSerialNumber(?string $ontSerialNumber): self
    {
        $this->ontSerialNumber = $ontSerialNumber;
        return $this;
    }
}
