<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class TerminateOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'TerminateOrderRequest_V2';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?string $orderId = null;

    #[SerializedName('DesiredTerminateDate')]
    private ?string $desiredTerminateDate = null;

    #[SerializedName('TerminateAsSoonAsPossible')]
    private ?bool $terminateAsSoonAsPossible = null;

    public function validate(): void
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['header', 'orderId', 'desiredTerminateDate'], $errors);

        // OrderId: must start with 'OID' and contain digits after
        if (property_exists($this, 'orderId')) {
            if (!preg_match('/^OID[0-9]+$/', $this->orderId ?? '')) {
                $errors[] = "OrderId must match pattern 'OID[0-9]+'. Given: '{$this->orderId}'";
            } else {
                Validator::assertStringLength($this->orderId, 1, null, 'OrderId', $errors);
            }
        }

        // DesiredTerminateDate: basic presence is checked above
        // Note: deeper validation (e.g., "must be before some future date") is done on server/backend
        // If you want to validate that it's a valid date:
        if (!is_string($this->desiredTerminateDate) || !strtotime($this->desiredTerminateDate)) {
            $errors[] = "DesiredTerminateDate must be a valid date string (e.g., 'YYYY-MM-DD'). Given: " . var_export($this->desiredTerminateDate, true);
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
     * @return TerminateOrderRequest
     */
    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * getOrderId
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * setOrderId
     * @param mixed $orderId
     * @return $this
     */
    public function setOrderId(?string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getDesiredTerminateDate(): ?string
    {
        return $this->desiredTerminateDate;
    }

    public function setDesiredTerminateDate(?\DateTimeInterface $date): self
    {
        $this->desiredTerminateDate = $date?->format('Y-m-d');
        return $this;
    }

    public function getTerminateAsSoonAsPossible(): ?bool
    {
        return $this->terminateAsSoonAsPossible;
    }

    public function setTerminateAsSoonAsPossible(?bool $flag): self
    {
        $this->terminateAsSoonAsPossible = $flag;
        return $this;
    }
}