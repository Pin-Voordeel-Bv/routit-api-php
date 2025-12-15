<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\State;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class UpgradeDslOrderDeclined
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?State $state = null;

    #[SerializedName('FromOrderId')]
    private ?string $fromOrderId = null;

    #[SerializedName('ToOrderId')]
    private ?string $toOrderId = null;

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

    public function getFromOrderId(): ?string
    {
        return $this->fromOrderId;
    }

    public function setFromOrderId(?string $fromOrderId): self
    {
        $this->fromOrderId = ($fromOrderId !== null && $fromOrderId !== '') ? $fromOrderId : null;
        return $this;
    }

    public function getToOrderId(): ?string
    {
        return $this->toOrderId;
    }

    public function setToOrderId(?string $toOrderId): self
    {
        $this->toOrderId = ($toOrderId !== null && $toOrderId !== '') ? $toOrderId : null;
        return $this;
    }
}
