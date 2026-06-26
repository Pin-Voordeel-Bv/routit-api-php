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
    private string $orderId;

    #[SerializedName('DesiredTerminateDate')]
    private ?string $desiredTerminateDate = null;

    #[SerializedName('TerminateAsSoonAsPossible')]
    private ?bool $terminateAsSoonAsPossible = null;

    public function validate(): void
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['header', 'orderId', 'desiredTerminateDate'], $errors);

        // orderId must be a non-empty string matching pattern: OID followed by digits
        Validator::assertInitializedStringMatchingPattern(
            $this,
            'orderId',
            '/^OID[0-9]+$/',
            'OrderId',
            $errors
        );

        Validator::assertOptionalDateString($this, 'desiredTerminateDate', $errors);

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
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * setOrderId
     * @param mixed $orderId
     * @return $this
     */
    public function setOrderId(string $orderId): self
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