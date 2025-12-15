<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class UpgradeOrderResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('UpgradeOrderId')]
    private ?int $upgradeOrderId = null;

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
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

    public function getUpgradeOrderId(): ?int
    {
        return $this->upgradeOrderId;
    }

    public function setUpgradeOrderId(?int $upgradeOrderId): self
    {
        $this->upgradeOrderId = $upgradeOrderId;
        return $this;
    }
}