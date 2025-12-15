<?php

namespace Inserve\RoutITAPI\Response\UpgradeDslOrderResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * DslChannelData_V1
 */
final class DslChannelData
{
    #[SerializedName('IsPrimary')]
    private ?bool $isPrimary = null;

    #[SerializedName('IpVpnOrderId')]
    private ?string $ipVpnOrderId = null;

    #[SerializedName('IpAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('Username')]
    private ?string $username = null;

    #[SerializedName('Password')]
    private ?string $password = null;

    #[SerializedName('LocalPvc')]
    private ?string $localPvc = null;

    #[SerializedName('ConnectionProtocol')]
    private ?string $connectionProtocol = null;

    #[SerializedName('LocalVlan')]
    private ?int $localVlan = null; // required in XSD (nillable), keep nullable for robustness

    public function getIsPrimary(): ?bool { return $this->isPrimary; }
    public function setIsPrimary(?bool $isPrimary): self { $this->isPrimary = $isPrimary; return $this; }

    public function getIpVpnOrderId(): ?string { return $this->ipVpnOrderId; }
    public function setIpVpnOrderId(?string $ipVpnOrderId): self { $this->ipVpnOrderId = $ipVpnOrderId; return $this; }

    public function getIpAddress(): ?string { return $this->ipAddress; }
    public function setIpAddress(?string $ipAddress): self { $this->ipAddress = $ipAddress; return $this; }

    public function getUsername(): ?string { return $this->username; }
    public function setUsername(?string $username): self { $this->username = $username; return $this; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(?string $password): self { $this->password = $password; return $this; }

    public function getLocalPvc(): ?string { return $this->localPvc; }
    public function setLocalPvc(?string $localPvc): self { $this->localPvc = $localPvc; return $this; }

    public function getConnectionProtocol(): ?string { return $this->connectionProtocol; }
    public function setConnectionProtocol(?string $connectionProtocol): self { $this->connectionProtocol = $connectionProtocol; return $this; }

    public function getLocalVlan(): ?int { return $this->localVlan; }
    public function setLocalVlan(?int $localVlan): self { $this->localVlan = $localVlan; return $this; }
}
