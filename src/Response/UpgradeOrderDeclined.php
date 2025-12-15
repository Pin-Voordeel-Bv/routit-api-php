<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class UpgradeOrderDeclined
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('Status')]
    private ?DeclinedStatus $status = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getStatus(): ?DeclinedStatus
    {
        return $this->status;
    }

    public function setStatus(?DeclinedStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

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
