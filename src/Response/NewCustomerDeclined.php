<?php
namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewCustomerDeclined
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?State $state = null;

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
}