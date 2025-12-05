<?php

namespace Inserve\RoutITAPI\Response\FiberOrderResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * FullAddress_V1
 */
final class FullAddress
{
    #[SerializedName('PostCode')]
    private ?string $postCode = null;

    #[SerializedName('HouseNumber')]
    private ?int $houseNumber = null;

    #[SerializedName('Extension')]
    private ?string $extension = null;

    #[SerializedName('Street')]
    private ?string $street = null;

    #[SerializedName('City')]
    private ?string $city = null;

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(?string $postCode): self
    {
        $this->postCode = $postCode;
        return $this;
    }

    public function getHouseNumber(): ?int
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(?int $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): self
    {
        $this->extension = $extension;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }
}
