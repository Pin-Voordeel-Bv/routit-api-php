<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyVlanFiberRequestData
{
    #[SerializedName('RouterAccessListId')]
    private ?int $routerAccessListId = null;

    #[SerializedName('IPVpnOrderId')]
    private ?int $ipVpnOrderId = null;

    #[SerializedName('Subnets')]
    private ?ArrayOfModifySubnetRequestData $subnets = null;

    #[SerializedName('IPAddressPE')]
    private ?string $ipAddressPe = null;

    #[SerializedName('PortInformation')]
    private ?ModifyPortInformation $portInformation = null;

    #[SerializedName('IsClosed')]
    private ?bool $isClosed = null;

    #[SerializedName('IsSubnetOverlapCheckDisabled')]
    private ?bool $isSubnetOverlapCheckDisabled = null;

    #[SerializedName('IsIPMigrationAllowed')]
    private ?bool $isIpMigrationAllowed = null;

    public function getRouterAccessListId(): ?int
    {
        return $this->routerAccessListId;
    }

    public function setRouterAccessListId(?int $id): self
    {
        $this->routerAccessListId = $id;
        return $this;
    }

    public function getSubnets(): ?ArrayOfModifySubnetRequestData
    {
        return $this->subnets;
    }

    public function setSubnets(?ArrayOfModifySubnetRequestData $subnets): self
    {
        $this->subnets = $subnets;
        return $this;
    }

    // optional setters
    public function setIpVpnOrderId(?int $id): self { $this->ipVpnOrderId = $id; return $this; }
    public function setIpAddressPe(?string $v): self { $this->ipAddressPe = $v; return $this; }
    public function setPortInformation(?ModifyPortInformation $v): self { $this->portInformation = $v; return $this; }
    public function setIsClosed(?bool $v): self { $this->isClosed = $v; return $this; }
    public function setIsSubnetOverlapCheckDisabled(?bool $v): self { $this->isSubnetOverlapCheckDisabled = $v; return $this; }
    public function setIsIpMigrationAllowed(?bool $v): self { $this->isIpMigrationAllowed = $v; return $this; }
}