<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use Inserve\RoutITAPI\Request\NewFiberOrderRequest\Enum\SubnetType;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\Enum\SubnetPriority;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class SubnetRequestData
{
    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('IPAddress')]
    private ?string $iPAddress = null;

    // We store strings for compatibility, expose helper to get enums
    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    public function getCidr(): ?int
    {
        return $this->cidr;
    }

    public function setCidr(?int $cidr): self
    {
        $this->cidr = $cidr;
        return $this;
    }

    public function getIPAddress(): ?string
    {
        return $this->iPAddress;
    }

    public function setIPAddress(?string $iPAddress): self
    {
        $this->iPAddress = $iPAddress;
        return $this;
    }

    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    /**
     * @param SubnetType|string|null $subnetType
     */
    public function setSubnetType(SubnetType|string|null $subnetType): self
    {
        if ($subnetType instanceof SubnetType) {
            $this->subnetType = $subnetType->value;
        } else {
            $this->subnetType = $subnetType;
        }

        return $this;
    }
    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }

    /**
     * @param SubnetPriority|string|null $subnetPriority
     */
    public function setSubnetPriority(SubnetPriority|string|null $subnetPriority): self
    {
        if ($subnetPriority instanceof SubnetPriority) {
            $this->subnetPriority = $subnetPriority->value;
        } else {
            $this->subnetPriority = $subnetPriority;
        }

        return $this;
    }
}