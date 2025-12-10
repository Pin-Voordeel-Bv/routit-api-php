<?php
namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyCustomerDeclined
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?State $state = null;

    #[SerializedName('CustomerId')]
    private ?string $customerId = null;

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

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }
}