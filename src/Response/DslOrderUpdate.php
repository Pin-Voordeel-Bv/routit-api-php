<?php

namespace Inserve\RoutITAPI\Response;

use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * DslOrderData_V3
 */
final class DslOrderUpdate
{
    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    // ─────────── OrderId ───────────

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }
}