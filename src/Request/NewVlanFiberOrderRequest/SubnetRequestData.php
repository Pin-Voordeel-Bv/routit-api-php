<?php

namespace Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest;

use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Enum\SubnetType;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class SubnetRequestData
{
    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    // ✅ getters (important for your serializer)
    public function getCidr(): ?int
    {
        return $this->cidr;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }

    // setters
    public function setCidr(?int $cidr): self
    {
        $this->cidr = $cidr;
        return $this;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setSubnetType(string|SubnetType|null $subnetType): self
    {
        $this->subnetType = $subnetType instanceof SubnetType ? $subnetType->value : $subnetType;
        return $this;
    }

    public function setSubnetPriority(string|SubnetPriority|null $subnetPriority): self
    {
        $this->subnetPriority = $subnetPriority instanceof SubnetPriority ? $subnetPriority->value : $subnetPriority;
        return $this;
    }
}