<?php

namespace Inserve\RoutITAPI\Response;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DslChannelData
{
    #[SerializedName('IsPrimary')]
    private ?bool $isPrimary = null;

    #[SerializedName('IpVpnOrderId')]
    private ?int $ipVpnOrderId = null;

    #[SerializedName('Username')]
    private ?string $username = null;

    #[SerializedName('Password')]
    private ?string $password = null;

    #[SerializedName('LocalPvc')]
    private ?string $localPvc = null;

    #[SerializedName('ConnectionProtocol')]
    private ?string $connectionProtocol = null;

    #[SerializedName('LocalVlan')]
    private ?int $localVlan = null;

    #[SerializedName('ServiceInstanceId')]
    private ?string $serviceInstanceId = null;

    #[SerializedName('ConnectionMethod')]
    private ?string $connectionMethod = null;

    #[SerializedName('RouterAccessList')]
    private ?string $routerAccessList = null;

    #[SerializedName('SubInterface')]
    private ?string $subInterface = null;

    #[SerializedName('ClassOfService')]
    private ?string $classOfService = null;

    #[SerializedName('ActualSpeed')]
    private ?int $actualSpeed = null;

    #[SerializedName('IsKpnNetwork')]
    private ?bool $isKpnNetwork = null;

    #[SerializedName('CpeIPAddress')]
    private ?string $cpeIpAddress = null;

    #[SerializedName('PEIPAddress')]
    private ?string $peIpAddress = null;

    #[SerializedName('DnsPrimary')]
    private ?string $dnsPrimary = null;

    #[SerializedName('DnsSecondary')]
    private ?string $dnsSecondary = null;

    /** @var SubnetData[]|null */
    #[SerializedName('Subnets')]
    private ?array $subnets = null;

    // ───────────────────── Subnets ─────────────────────

    /** @return SubnetData[] */
    public function getSubnets(): array
    {
        return $this->subnets ?? [];
    }

    /**
     * @param SubnetData[]|null $subnets
     */
    public function setSubnets(?array $subnets): self
    {
        $this->subnets = $subnets;
        return $this;
    }

    // ───────────────────── IsPrimary ─────────────────────

    public function getIsPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    public function setIsPrimary(?bool $isPrimary): self
    {
        $this->isPrimary = $isPrimary;
        return $this;
    }

    // ───────────────────── IpVpnOrderId ─────────────────────

    public function getIpVpnOrderId(): ?int
    {
        return $this->ipVpnOrderId;
    }

    public function setIpVpnOrderId(?int $ipVpnOrderId): self
    {
        $this->ipVpnOrderId = $ipVpnOrderId;
        return $this;
    }

    // ───────────────────── Username ─────────────────────

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    // ───────────────────── Password ─────────────────────

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    // ───────────────────── LocalPvc ─────────────────────

    public function getLocalPvc(): ?string
    {
        return $this->localPvc;
    }

    public function setLocalPvc(?string $localPvc): self
    {
        $this->localPvc = $localPvc;
        return $this;
    }

    // ───────────────────── ConnectionProtocol ─────────────────────

    public function getConnectionProtocol(): ?string
    {
        return $this->connectionProtocol;
    }

    public function setConnectionProtocol(?string $connectionProtocol): self
    {
        $this->connectionProtocol = $connectionProtocol;
        return $this;
    }

    // ───────────────────── LocalVlan ─────────────────────

    public function getLocalVlan(): ?int
    {
        return $this->localVlan;
    }

    public function setLocalVlan(?int $localVlan): self
    {
        $this->localVlan = $localVlan;
        return $this;
    }

    // ───────────────────── ServiceInstanceId ─────────────────────

    public function getServiceInstanceId(): ?string
    {
        return $this->serviceInstanceId;
    }

    public function setServiceInstanceId(?string $serviceInstanceId): self
    {
        $this->serviceInstanceId = $serviceInstanceId;
        return $this;
    }

    // ───────────────────── ConnectionMethod ─────────────────────

    public function getConnectionMethod(): ?string
    {
        return $this->connectionMethod;
    }

    public function setConnectionMethod(?string $connectionMethod): self
    {
        $this->connectionMethod = $connectionMethod;
        return $this;
    }

    // ───────────────────── RouterAccessList ─────────────────────

    public function getRouterAccessList(): ?string
    {
        return $this->routerAccessList;
    }

    public function setRouterAccessList(?string $routerAccessList): self
    {
        $this->routerAccessList = $routerAccessList;
        return $this;
    }

    // ───────────────────── SubInterface ─────────────────────

    public function getSubInterface(): ?string
    {
        return $this->subInterface;
    }

    public function setSubInterface(?string $subInterface): self
    {
        $this->subInterface = $subInterface;
        return $this;
    }

    // ───────────────────── ClassOfService ─────────────────────

    public function getClassOfService(): ?string
    {
        return $this->classOfService;
    }

    public function setClassOfService(?string $classOfService): self
    {
        $this->classOfService = $classOfService;
        return $this;
    }

    // ───────────────────── ActualSpeed ─────────────────────

    public function getActualSpeed(): ?int
    {
        return $this->actualSpeed;
    }

    public function setActualSpeed(?int $actualSpeed): self
    {
        $this->actualSpeed = $actualSpeed;
        return $this;
    }

    // ───────────────────── IsKpnNetwork ─────────────────────

    public function getIsKpnNetwork(): ?bool
    {
        return $this->isKpnNetwork;
    }

    public function setIsKpnNetwork(?bool $isKpnNetwork): self
    {
        $this->isKpnNetwork = $isKpnNetwork;
        return $this;
    }

    // ───────────────────── CpeIPAddress ─────────────────────

    public function getCpeIpAddress(): ?string
    {
        return $this->cpeIpAddress;
    }

    public function setCpeIpAddress(?string $cpeIpAddress): self
    {
        $this->cpeIpAddress = $cpeIpAddress;
        return $this;
    }

    // ───────────────────── PEIPAddress ─────────────────────

    public function getPeIpAddress(): ?string
    {
        return $this->peIpAddress;
    }

    public function setPeIpAddress(?string $peIpAddress): self
    {
        $this->peIpAddress = $peIpAddress;
        return $this;
    }

    // ───────────────────── DnsPrimary ─────────────────────

    public function getDnsPrimary(): ?string
    {
        return $this->dnsPrimary;
    }

    public function setDnsPrimary(?string $dnsPrimary): self
    {
        $this->dnsPrimary = $dnsPrimary;
        return $this;
    }

    // ───────────────────── DnsSecondary ─────────────────────

    public function getDnsSecondary(): ?string
    {
        return $this->dnsSecondary;
    }

    public function setDnsSecondary(?string $dnsSecondary): self
    {
        $this->dnsSecondary = $dnsSecondary;
        return $this;
    }
}