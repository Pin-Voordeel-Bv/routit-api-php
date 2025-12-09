<?php

namespace Inserve\RoutITAPI\Response;

use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * FiberOrderResponseData_V1
 */
final class DslOrderResponse
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