<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\VlanFiberOrderResponse\OrderStatus;
use Inserve\RoutITAPI\Response\VlanFiberOrderResponse\VlanFiberOrderResponseData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class VlanFiberOrderResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('Status')]
    private ?OrderStatus $status = null;

    #[SerializedName('OrderData')]
    private ?VlanFiberOrderResponseData $orderData = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    public function getHeader(): ?Header { return $this->header; }
    public function getStatus(): ?OrderStatus { return $this->status; }
    public function getOrderData(): ?VlanFiberOrderResponseData { return $this->orderData; }
    public function getOrderId(): ?int { return $this->orderId; }

    public function setHeader(?Header $header): self { $this->header = $header; return $this; }
    public function setStatus(?OrderStatus $status): self { $this->status = $status; return $this; }
    public function setOrderData(?VlanFiberOrderResponseData $orderData): self { $this->orderData = $orderData; return $this; }
    public function setOrderId(?int $orderId): self { $this->orderId = $orderId; return $this; }
}