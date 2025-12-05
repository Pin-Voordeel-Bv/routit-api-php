<?php

namespace Inserve\RoutITAPI\Response\FiberOrderResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * VlanFiberOrderResponseData_V1
 */
final class VlanFiberOrderResponseData
{
    #[SerializedName('IpAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('NrOfHosts')]
    private ?int $nrOfHosts = null;

    #[SerializedName('IpAddressCIDR6')]
    private ?int $ipAddressCIDR6 = null;

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

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function getNrOfHosts(): ?int
    {
        return $this->nrOfHosts;
    }

    public function setNrOfHosts(?int $nrOfHosts): self
    {
        $this->nrOfHosts = $nrOfHosts;
        return $this;
    }

    public function getIpAddressCIDR6(): ?int
    {
        return $this->ipAddressCIDR6;
    }

    public function setIpAddressCIDR6(?int $ipAddressCIDR6): self
    {
        $this->ipAddressCIDR6 = $ipAddressCIDR6;
        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getIpVpnOrderId(): ?int
    {
        return $this->ipVpnOrderId;
    }

    public function setIpVpnOrderId(?int $ipVpnOrderId): self
    {
        $this->ipVpnOrderId = $ipVpnOrderId;
        return $this;
    }

    public function getRouterAccessList(): ?string
    {
        return $this->routerAccessList;
    }

    public function setRouterAccessList(?string $routerAccessList): self
    {
        $this->routerAccessList = $routerAccessList;
        return $this;
    }

    public function getPortNrSwitch(): ?string
    {
        return $this->portNrSwitch;
    }

    public function setPortNrSwitch(?string $portNrSwitch): self
    {
        $this->portNrSwitch = $portNrSwitch;
        return $this;
    }

    public function getLineType(): ?string
    {
        return $this->lineType;
    }

    public function setLineType(?string $lineType): self
    {
        $this->lineType = $lineType;
        return $this;
    }

    public function getServiceOrderId(): ?string
    {
        return $this->serviceOrderId;
    }

    public function setServiceOrderId(?string $serviceOrderId): self
    {
        $this->serviceOrderId = $serviceOrderId;
        return $this;
    }

    public function getServiceVlanId(): ?string
    {
        return $this->serviceVlanId;
    }

    public function setServiceVlanId(?string $serviceVlanId): self
    {
        $this->serviceVlanId = $serviceVlanId;
        return $this;
    }
}
