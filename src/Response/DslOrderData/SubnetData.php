<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Enum\IPVersion;
use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Response\DslOrderData\Enum\SubnetState;
use Inserve\RoutITAPI\Enum\SubnetType;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class SubnetData
{
    #[SerializedName('SubnetMask')]
    private ?string $subnetMask = null;

    #[SerializedName('IpAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    #[SerializedName('SubnetState')]
    private ?string $subnetState = null;

    #[SerializedName('IPVersion')]
    private ?string $ipVersion = null;

    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    public function getSubnetMask(): ?string
    {
        return $this->subnetMask;
    }

    public function setSubnetMask(?string $subnetMask): self
    {
        $this->subnetMask = $subnetMask;
        return $this;
    }

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

    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    public function setSubnetType(?string $subnetType): self
    {
        $this->subnetType = $subnetType;
        return $this;
    }

    public function getSubnetState(): ?string
    {
        return $this->subnetState;
    }

    public function setSubnetState(?string $subnetState): self
    {
        $this->subnetState = $subnetState;
        return $this;
    }

    public function getIpVersion(): ?string
    {
        return $this->ipVersion;
    }

    public function setIpVersion(?string $ipVersion): self
    {
        $this->ipVersion = $ipVersion;
        return $this;
    }

    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }

    public function setSubnetPriority(?string $subnetPriority): self
    {
        $this->subnetPriority = $subnetPriority;
        return $this;
    }

    // enum helpers

    public function getSubnetTypeEnum(): ?SubnetType
    {
        return $this->subnetType !== null
            ? SubnetType::tryFrom($this->subnetType)
            : null;
    }

    public function getSubnetStateEnum(): ?SubnetState
    {
        return $this->subnetState !== null
            ? SubnetState::tryFrom($this->subnetState)
            : null;
    }

    public function getIpVersionEnum(): ?IPVersion
    {
        return $this->ipVersion !== null
            ? IPVersion::tryFrom($this->ipVersion)
            : null;
    }

    public function getSubnetPriorityEnum(): ?SubnetPriority
    {
        return $this->subnetPriority !== null
            ? SubnetPriority::tryFrom($this->subnetPriority)
            : null;
    }
}