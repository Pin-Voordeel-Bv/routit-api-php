<?php

namespace Inserve\RoutITAPI\Request\NewDslOrderRequest;

use Inserve\RoutITAPI\Request\NewDslOrderRequest\Subnet;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

final class DslChannel
{
    #[SerializedName('IsPrimary')]
    private ?bool $isPrimary = null;

    #[SerializedName('ProductCode')]
    private ?string $productCode = null;

    #[SerializedName('IpVpnOrderId')]
    private ?int $ipVpnOrderId = null;

    /** @var Subnet[]|null */
    #[SerializedPath('[Subnets][Subnet_V1]')]
    private ?array $subnets = null;

    #[SerializedName('LocalPvcId')]
    private ?int $localPvcId = null;

    #[SerializedName('LocalVlan')]
    private ?int $localVlan = null;

    #[SerializedName('IsKpnNetwork')]
    private ?bool $isKpnNetwork = null;

    #[SerializedName('IsNumbered')]
    private ?bool $isNumbered = null;

    #[SerializedName('IsShut')]
    private ?bool $isShut = null;

    #[SerializedName('IsSubnetOverlapCheckDisabled')]
    private ?bool $isSubnetOverlapCheckDisabled = null;

    #[SerializedName('Username')]
    private ?string $username = null;

    #[SerializedName('Password')]
    private ?string $password = null;

    // Getters / setters

    public function isPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    public function setIsPrimary(?bool $isPrimary): self
    {
        $this->isPrimary = $isPrimary;
        return $this;
    }

    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(?string $productCode): self
    {
        $this->productCode = $productCode;
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

    /**
     * @return Subnet[]|null
     */
    public function getSubnets(): ?array
    {
        return $this->subnets;
    }

    /**
     * @param Subnet[]|null $subnets
     */
    public function setSubnets(?array $subnets): self
    {
        $this->subnets = $subnets;
        return $this;
    }

    public function getLocalPvcId(): ?int
    {
        return $this->localPvcId;
    }

    public function setLocalPvcId(?int $localPvcId): self
    {
        $this->localPvcId = $localPvcId;
        return $this;
    }

    public function getLocalVlan(): ?int
    {
        return $this->localVlan;
    }

    public function setLocalVlan(?int $localVlan): self
    {
        $this->localVlan = $localVlan;
        return $this;
    }

    public function getIsKpnNetwork(): ?bool
    {
        return $this->isKpnNetwork;
    }

    public function setIsKpnNetwork(?bool $isKpnNetwork): self
    {
        $this->isKpnNetwork = $isKpnNetwork;
        return $this;
    }

    public function getIsNumbered(): ?bool
    {
        return $this->isNumbered;
    }

    public function setIsNumbered(?bool $isNumbered): self
    {
        $this->isNumbered = $isNumbered;
        return $this;
    }

    public function getIsShut(): ?bool
    {
        return $this->isShut;
    }

    public function setIsShut(?bool $isShut): self
    {
        $this->isShut = $isShut;
        return $this;
    }

    public function getIsSubnetOverlapCheckDisabled(): ?bool
    {
        return $this->isSubnetOverlapCheckDisabled;
    }

    public function setIsSubnetOverlapCheckDisabled(?bool $isSubnetOverlapCheckDisabled): self
    {
        $this->isSubnetOverlapCheckDisabled = $isSubnetOverlapCheckDisabled;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
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
}