<?php

namespace Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class NetworkInformation
{
    #[SerializedName('CountryNet')]
    private ?string $countryNet = null; // A / B

    #[SerializedName('SegregateVlanOrderId')]
    private ?int $segregateVlanOrderId = null;

    public function getCountryNet(): ?string
    {
        return $this->countryNet;
    }

    public function setCountryNet(?string $countryNet): self
    {
        $this->countryNet = $countryNet;
        return $this;
    }

    public function getSegregateVlanOrderId(): ?int
    {
        return $this->segregateVlanOrderId;
    }

    public function setSegregateVlanOrderId(?int $segregateVlanOrderId): self
    {
        $this->segregateVlanOrderId = $segregateVlanOrderId;
        return $this;
    }
}