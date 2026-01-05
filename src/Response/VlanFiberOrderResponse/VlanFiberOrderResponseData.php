<?php

namespace Inserve\RoutITAPI\Response\VlanFiberOrderResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class VlanFiberOrderResponseData
{
    #[SerializedName('Subnets')]
    private ?ArrayOfSubnetData $subnets = null;

    #[SerializedName('UserName')]
    private ?string $userName = null;

    #[SerializedName('Password')]
    private ?string $password = null;

    #[SerializedName('IPVpnOrderId')]
    private ?int $ipVpnOrderId = null;

    #[SerializedName('RouterAccessList')]
    private ?string $routerAccessList = null;

    #[SerializedName('PortNrSwitch')]
    private ?string $portNrSwitch = null;

    #[SerializedName('LineType')]
    private ?string $lineType = null;

    #[SerializedName('ServiceOrderId')]
    private ?string $serviceOrderId = null;

    #[SerializedName('ServiceVlanId')]
    private ?string $serviceVlanId = null;

    #[SerializedName('IsIPMigrationAllowed')]
    private ?bool $isIpMigrationAllowed = null; // required in XSD

    // getters
    public function getSubnets(): ?ArrayOfSubnetData { return $this->subnets; }
    public function getUserName(): ?string { return $this->userName; }
    public function getPassword(): ?string { return $this->password; }
    public function getIpVpnOrderId(): ?int { return $this->ipVpnOrderId; }
    public function getRouterAccessList(): ?string { return $this->routerAccessList; }
    public function getPortNrSwitch(): ?string { return $this->portNrSwitch; }
    public function getLineType(): ?string { return $this->lineType; }
    public function getServiceOrderId(): ?string { return $this->serviceOrderId; }
    public function getServiceVlanId(): ?string { return $this->serviceVlanId; }
    public function getIsIpMigrationAllowed(): ?bool { return $this->isIpMigrationAllowed; }

    // setters
    public function setSubnets(?ArrayOfSubnetData $subnets): self { $this->subnets = $subnets; return $this; }
    public function setUserName(?string $userName): self { $this->userName = $userName; return $this; }
    public function setPassword(?string $password): self { $this->password = $password; return $this; }
    public function setIpVpnOrderId(?int $ipVpnOrderId): self { $this->ipVpnOrderId = $ipVpnOrderId; return $this; }
    public function setRouterAccessList(?string $routerAccessList): self { $this->routerAccessList = $routerAccessList; return $this; }
    public function setPortNrSwitch(?string $portNrSwitch): self { $this->portNrSwitch = $portNrSwitch; return $this; }
    public function setLineType(?string $lineType): self { $this->lineType = $lineType; return $this; }
    public function setServiceOrderId(?string $serviceOrderId): self { $this->serviceOrderId = $serviceOrderId; return $this; }
    public function setServiceVlanId(?string $serviceVlanId): self { $this->serviceVlanId = $serviceVlanId; return $this; }
    public function setIsIpMigrationAllowed(?bool $allowed): self { $this->isIpMigrationAllowed = $allowed; return $this; }
}