<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;

use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Enum\SubnetType;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifySubnetRequestData
{
    // ───────── REQUIRED (XSD) ─────────

    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('SubnetType')]
    private ?string $subnetType = null; // enum serialized as string

    #[SerializedName('SubnetId')]
    private ?int $subnetId = null;

    // ───────── OPTIONAL ─────────

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null; // enum serialized as string

    public function validate(): array
    {
        $errors = [];

        Validator::assertInitializedInt($this, 'subnetId', $errors);
        // Validator::validateNested($this->subnet ?? null, 'subnet', $errors);
        Validator::assertInitializedInt($this, 'cidr', $errors);
        Validator::assertOptionalStringLength($this->ipAddress ?? null, null, 255, 'IPAddress', $errors);
        Validator::assertRequiredEnum($this->subnetType ?? null, ['Primary', 'Secondary', 'StaticRoute'], 'SubnetType', $errors);
        Validator::assertOptionalEnumValue($this->subnetPriority ?? null, ['P90', 'P100', 'P110'], 'SubnetPriority', $errors);

        return $errors;
    }

    /* =========================
       Setters
       ========================= */

    public function setCidr(?int $cidr): self
    {
        $this->cidr = $cidr;
        return $this;
    }

    public function setSubnetType(string|SubnetType|null $subnetType): self
    {
        $this->subnetType = $subnetType instanceof SubnetType
            ? $subnetType->value
            : $subnetType;

        return $this;
    }

    public function setSubnetId(?int $subnetId): self
    {
        $this->subnetId = $subnetId;
        return $this;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setSubnetPriority(string|SubnetPriority|null $subnetPriority): self
    {
        $this->subnetPriority = $subnetPriority instanceof SubnetPriority
            ? $subnetPriority->value
            : $subnetPriority;

        return $this;
    }

    /* =========================
       Getters (CRITICAL for Symfony)
       ========================= */

    public function getCidr(): ?int
    {
        return $this->cidr;
    }

    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    public function getSubnetId(): ?int
    {
        return $this->subnetId;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }
}