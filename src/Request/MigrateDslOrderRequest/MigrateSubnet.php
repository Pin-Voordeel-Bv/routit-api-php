<?php

namespace Inserve\RoutITAPI\Request\MigrateDslOrderRequest;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class MigrateSubnet
{
    #[SerializedName('IPServiceId')]
    private ?string $ipServiceId = null;

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    public function getIpServiceId(): ?string
    {
        return $this->ipServiceId;
    }

    public function setIpServiceId(?string $ipServiceId): self
    {
        $this->ipServiceId = $ipServiceId;
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
}