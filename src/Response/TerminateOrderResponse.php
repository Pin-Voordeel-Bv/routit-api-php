<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class TerminateOrderResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?State $state = null;

    #[SerializedName('OrderId')]
    private ?string $orderId = null;

    #[SerializedName('PlanDate')]
    private ?\DateTimeInterface $planDate = null;

    // ───────── Getters and Setters ─────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
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

    public function getPlanDate(): ?\DateTimeInterface
    {
        return $this->planDate;
    }

    public function setPlanDate(?\DateTimeInterface $planDate): self
    {
        $this->planDate = $planDate;
        return $this;
    }
}