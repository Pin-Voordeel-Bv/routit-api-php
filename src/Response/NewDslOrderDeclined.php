<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewDslOrderDeclined
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?NewDslOrderDeclinedState $state = null;

    #[SerializedName('OrderId')]
    private ?string $orderId = null;

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getState(): ?NewDslOrderDeclinedState
    {
        return $this->state;
    }

    public function setState(?NewDslOrderDeclinedState $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(?string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }
}