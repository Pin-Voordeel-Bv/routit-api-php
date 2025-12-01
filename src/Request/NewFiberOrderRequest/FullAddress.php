<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class FullAddress
{
    #[SerializedName('PostCode')]
    private string $postCode;

    #[SerializedName('HouseNumber')]
    private int $houseNumber;

    #[SerializedName('Extension')]
    private ?string $extension = null;

    #[SerializedName('Street')]
    private string $street;

    #[SerializedName('City')]
    private string $city;

    public function setPostCode(string $v): self { $this->postCode = $v; return $this; }
    public function setHouseNumber(int $v): self { $this->houseNumber = $v; return $this; }
    public function setExtension(?string $v): self { $this->extension = $v; return $this; }
    public function setStreet(string $v): self { $this->street = $v; return $this; }
    public function setCity(string $v): self { $this->city = $v; return $this; }

    public function getPostCode(): string { return $this->postCode; }
    public function getHouseNumber(): int { return $this->houseNumber; }
    public function getExtension(): ?string { return $this->extension; }
    public function getStreet(): string { return $this->street; }
    public function getCity(): string { return $this->city; }
}
