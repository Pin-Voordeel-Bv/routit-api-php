<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\DslOrderData\DslOrderData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewDslOrderResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?State $state = null;

    #[SerializedName('DslOrderData')]
    private ?DslOrderData $dslOrderData = null;

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

    public function getDslOrderData(): ?DslOrderData
    {
        return $this->dslOrderData;
    }

    public function setDslOrderData(?DslOrderData $dslOrderData): self
    {
        $this->dslOrderData = $dslOrderData;
        return $this;
    }
}
