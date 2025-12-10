<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class OrderDeclined
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    // XML: <Status>...</Status>
    #[SerializedName('Status')]
    private ?DeclinedState $declinedState = null;

    #[SerializedName('CustomerId')]
    private ?int $customerId = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('ParentOrderId')]
    private ?int $parentOrderId = null;

    // ───────── Header ─────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    // ───────── Status / DeclinedState ─────────

    public function getDeclinedState(): ?DeclinedState
    {
        return $this->declinedState;
    }

    public function setDeclinedState(?DeclinedState $declinedState): self
    {
        $this->declinedState = $declinedState;
        return $this;
    }

    // ───────── CustomerId ─────────

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function setCustomerId(?int $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    // ───────── OrderId ─────────

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    // ───────── ParentOrderId ─────────

    public function getParentOrderId(): ?int
    {
        return $this->parentOrderId;
    }

    public function setParentOrderId(?int $parentOrderId): self
    {
        $this->parentOrderId = $parentOrderId;
        return $this;
    }
}