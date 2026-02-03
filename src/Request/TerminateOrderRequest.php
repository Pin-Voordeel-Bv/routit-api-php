<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
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