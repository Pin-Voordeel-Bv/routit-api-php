<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;

use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Enum\SubnetType;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SubnetRequestData
{
    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    // serialized as TEXT only (no extra enum fields)
    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    // serialized as TEXT only (no extra enum fields)
    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

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