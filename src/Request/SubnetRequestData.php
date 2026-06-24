<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Enum\SubnetType;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class SubnetRequestData
{
    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    public function validate(array &$errors): void
    {
        Validator::assertRequiredFieldsPresent($this, ['cidr', 'subnetType'], $errors);

        Validator::assertOptionalStringLength($this->ipAddress, null, 255, 'IpAddress', $errors);
        Validator::assertEnumValue($this->subnetType, ['Primary', 'Secondary', 'StaticRoute'], 'SubnetType', $errors);
        Validator::assertOptionalEnumValue($this->subnetPriority ?? null, ['P90', 'P100', 'P110'], 'SubnetPriority', $errors);

        if (!is_int($this->cidr)) {
            $errors[] = "CIDR must be an integer.";
        } elseif (!in_array($this->cidr, [24, 25, 26, 27, 28, 29, 30, 32], true)) {
            $errors[] = "CIDR must be one of: 32, 30, 29, 28, 27, 26, 25, 24. Given: {$this->cidr}";
        }
    }

    // ✅ getters (important for your serializer)
    public function getCidr(): ?int
    {
        return $this->cidr;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }

    // setters
    public function setCidr(?int $cidr): self
    {
        $this->cidr = $cidr;
        return $this;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setSubnetType(string|SubnetType|null $subnetType): self
    {
        $this->subnetType = $subnetType instanceof SubnetType ? $subnetType->value : $subnetType;
        return $this;
    }

    public function setSubnetPriority(string|SubnetPriority|null $subnetPriority): self
    {
        $this->subnetPriority = $subnetPriority instanceof SubnetPriority ? $subnetPriority->value : $subnetPriority;
        return $this;
    }
}