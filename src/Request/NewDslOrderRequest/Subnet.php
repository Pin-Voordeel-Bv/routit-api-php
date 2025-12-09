<?php

namespace Inserve\RoutITAPI\Request\NewDslOrderRequest;

use Inserve\RoutITAPI\Request\NewDslOrderRequest\Enum\IPVersion;
use Inserve\RoutITAPI\Request\Enum\SubnetType;
use Inserve\RoutITAPI\Request\Enum\SubnetPriority;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\Ignore;

final class Subnet
{
    #[SerializedName('IpAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    // ───── SubnetType as string for XML ─────
    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    // enum only for your own code, NOT serialized
    #[Ignore]
    private ?SubnetType $subnetTypeEnum = null;

    // ───── IPVersion as string for XML ─────
    #[SerializedName('IPVersion')]
    private ?string $ipVersion = null;

    #[Ignore]
    private ?IPVersion $ipVersionEnum = null;

    // ───── SubnetPriority as string for XML ─────
    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    #[Ignore]
    private ?SubnetPriority $subnetPriorityEnum = null;

    // -------- Getters / setters --------

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function getCidr(): ?int
    {
        return $this->cidr;
    }

    public function setCidr(?int $cidr): self
    {
        $this->cidr = $cidr;
        return $this;
    }

    // SubnetType enum API
    public function getSubnetTypeEnum(): ?SubnetType
    {
        return $this->subnetTypeEnum;
    }

    public function setSubnetType(?SubnetType $enum): self
    {
        $this->subnetTypeEnum = $enum;
        $this->subnetType = $enum?->value; // <- THIS is what goes to XML
        return $this;
    }

    // If you also want raw string getter:
    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    // IPVersion enum API
    public function getIpVersionEnum(): ?IPVersion
    {
        return $this->ipVersionEnum;
    }

    public function setIpVersion(?IPVersion $enum): self
    {
        $this->ipVersionEnum = $enum;
        $this->ipVersion = $enum?->value;
        return $this;
    }

    public function getIpVersion(): ?string
    {
        return $this->ipVersion;
    }

    // SubnetPriority enum API
    public function getSubnetPriorityEnum(): ?SubnetPriority
    {
        return $this->subnetPriorityEnum;
    }

    public function setSubnetPriority(?SubnetPriority $enum): self
    {
        $this->subnetPriorityEnum = $enum;
        $this->subnetPriority = $enum?->value;
        return $this;
    }

    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }
}