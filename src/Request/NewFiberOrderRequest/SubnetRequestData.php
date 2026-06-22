<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use Inserve\RoutITAPI\Enum\SubnetType;
use Inserve\RoutITAPI\Enum\SubnetPriority;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class SubnetRequestData
{
    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    #[SerializedName('IPAddress')]
    private ?string $iPAddress = null;

    // We store strings for compatibility, expose helper to get enums
    #[SerializedName('SubnetType')]
    private ?string $subnetType = null;

    #[SerializedName('SubnetPriority')]
    private ?string $subnetPriority = null;

    public function validate(): array
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['cidr', 'subnetType'], $errors);

        if (!is_int($this->cidr)) {
            $errors[] = "CIDR must be an integer.";
        } elseif (!in_array($this->cidr, [24, 25, 26, 27, 28, 29, 30, 32], true)) {
            $errors[] = "CIDR must be one of: 24, 25, 26, 27, 28, 29, 30, 32. Given: {$this->cidr}";
        }

        Validator::assertOptionalStringLength($this->ipAddress, null, 255, 'IPAddress', $errors);

        Validator::assertEnumValue($this->subnetType, ['Unknown', 'Primary', 'Secondary', 'StaticRoute'], 'SubnetType', $errors);

        Validator::assertOptionalEnumValue($this->subnetPriority, ['P90', 'P100', 'P110'], 'SubnetPriority', $errors);

        return $errors;
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

    public function getIPAddress(): ?string
    {
        return $this->iPAddress;
    }

    public function setIPAddress(?string $iPAddress): self
    {
        $this->iPAddress = $iPAddress;
        return $this;
    }

    public function getSubnetType(): ?string
    {
        return $this->subnetType;
    }

    /**
     * @param SubnetType|string|null $subnetType
     */
    public function setSubnetType(SubnetType|string|null $subnetType): self
    {
        if ($subnetType instanceof SubnetType) {
            $this->subnetType = $subnetType->value;
        } else {
            $this->subnetType = $subnetType;
        }

        return $this;
    }
    public function getSubnetPriority(): ?string
    {
        return $this->subnetPriority;
    }

    /**
     * @param SubnetPriority|string|null $subnetPriority
     */
    public function setSubnetPriority(SubnetPriority|string|null $subnetPriority): self
    {
        if ($subnetPriority instanceof SubnetPriority) {
            $this->subnetPriority = $subnetPriority->value;
        } else {
            $this->subnetPriority = $subnetPriority;
        }

        return $this;
    }
}