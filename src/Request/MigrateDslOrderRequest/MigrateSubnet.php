<?php

namespace Inserve\RoutITAPI\Request\MigrateDslOrderRequest;

use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class MigrateSubnet
{
    #[SerializedName('IPServiceId')]
    private ?string $ipServiceId = null;

    #[SerializedName('IPAddress')]
    private ?string $ipAddress = null;

    #[SerializedName('Cidr')]
    private ?int $cidr = null;

    public function validate(): array
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, [
            'ipServiceId',
            'ipAddress',
            'cidr',
        ], $errors);

        Validator::assertStringLength($this->ipServiceId, 1, null, 'IPServiceId', $errors);
        Validator::assertStringLength($this->ipAddress, 1, 45, 'IPAddress', $errors); // 45 chars to accommodate IPv6 if needed

        // CIDR: must be an int between 24 and 32
        if (!is_int($this->cidr)) {
            $errors[] = "CIDR must be an integer.";
        } elseif (!in_array($this->cidr, range(24, 32), true)) {
            $errors[] = "CIDR must be one of: 24–32. Given: {$this->cidr}";
        }

        return $errors;
    }

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