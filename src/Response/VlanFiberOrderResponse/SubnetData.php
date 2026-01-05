<?php

namespace Inserve\RoutITAPI\Response\VlanFiberOrderResponse;

use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Enum\SubnetType;
use Inserve\RoutITAPI\Response\VlanFiberOrderResponse\Enum\SubnetState;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class SubnetData
{
    #[SerializedName('SubnetId')]
    private ?int $subnetId = null;

    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('SubnetState')]
    private ?string $subnetState = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    // getters (serializer-friendly)

    public function getSubnetId(): ?int { return $this->subnetId; }
    public function getSubnetType(): ?string { return $this->subnetType; }
    public function getIpAddress(): ?string { return $this->ipAddress; }
    public function getCidr(): ?int { return $this->cidr; }
    public function getSubnetState(): ?string { return $this->subnetState; }
    public function getSubnetPriority(): ?string { return $this->subnetPriority; }

    // setters

    public function setSubnetId(?int $subnetId): self
    {
        $this->subnetId = $subnetId;
        return $this;
    }

    public function setSubnetType(string|SubnetType|null $subnetType): self
    {
        $this->subnetType = $subnetType instanceof SubnetType ? $subnetType->value : $subnetType;
        return $this;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setCidr(?int $cidr): self
    {
        $this->cidr = $cidr;
        return $this;
    }

    public function setSubnetState(string|SubnetState|null $state): self
    {
        $this->subnetState = $state instanceof SubnetState ? $state->value : $state;
        return $this;
    }

    public function setSubnetPriority(string|SubnetPriority|null $priority): self
    {
        $this->subnetPriority = $priority instanceof SubnetPriority ? $priority->value : $priority;
        return $this;
    }

    // enum helpers

    public function getSubnetTypeEnum(): ?SubnetType
    {
        return $this->subnetType !== null ? SubnetType::tryFrom($this->subnetType) : null;
    }

    public function getSubnetPriorityEnum(): ?SubnetPriority
    {
        return $this->subnetPriority !== null ? SubnetPriority::tryFrom($this->subnetPriority) : null;
    }

    public function getSubnetStateEnum(): ?SubnetState
    {
        return $this->subnetState !== null ? SubnetState::tryFrom($this->subnetState) : null;
    }
}