<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\FiberOrderResponse\FiberOrderResponseData;
use Inserve\RoutITAPI\Response\FiberOrderResponse\OrderStatus;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class FiberOrderResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('Status')]
    private ?OrderStatus $status = null;

    // IMPORTANT: XSD says this node is named OrderData
    #[SerializedName('OrderData')]
    private ?FiberOrderResponseData $orderData = null; // this is your FiberOrderResponseData_V1 class

    public function getHeader(): ?Header { return $this->header; }
    public function setHeader(?Header $header): self { $this->header = $header; return $this; }

    public function getStatus(): ?OrderStatus { return $this->status; }
    public function setStatus(?OrderStatus $status): self { $this->status = $status; return $this; }

    public function getOrderData(): ?FiberOrderResponseData { return $this->orderData; }
    public function setOrderData(?FiberOrderResponseData $orderData): self { $this->orderData = $orderData; return $this; }
}