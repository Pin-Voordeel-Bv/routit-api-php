<?php

namespace Inserve\RoutITAPI\Response\Ftth;

use Inserve\RoutITAPI\Response\FtthLineTestResponse\Enum\FtthLineTestLineStatus;
use Inserve\RoutITAPI\Response\FtthLineTestResponse\Enum\FtthLineTestTechnologyType;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class FtthLineTestResult
{
    #[SerializedName('LastStatusChange')]
    private ?string $lastStatusChange = null;

    #[SerializedName('FtthLineTestLineStatus')]
    private ?string $ftthLineTestLineStatus = null;

    #[SerializedName('MacAddresses')]
    private ?string $macAddresses = null;

    #[SerializedName('FtthLineTestTechnologyType')]
    private ?string $ftthLineTestTechnologyType = null;

    #[SerializedName('Vlans')]
    private ?string $vlans = null;

    // ───────── LastStatusChange ─────────

    public function getLastStatusChange(): ?string
    {
        return $this->lastStatusChange;
    }

    public function setLastStatusChange(?string $lastStatusChange): self
    {
        $this->lastStatusChange = $lastStatusChange;
        return $this;
    }

    // ───────── LineStatus ─────────

    public function getFtthLineTestLineStatus(): ?string
    {
        return $this->ftthLineTestLineStatus;
    }

    public function setFtthLineTestLineStatus(?string $status): self
    {
        $this->ftthLineTestLineStatus = $status;
        return $this;
    }

    public function getFtthLineTestLineStatusEnum(): ?FtthLineTestLineStatus
    {
        return $this->ftthLineTestLineStatus !== null
            ? FtthLineTestLineStatus::tryFrom($this->ftthLineTestLineStatus)
            : null;
    }

    public function setFtthLineTestLineStatusEnum(?FtthLineTestLineStatus $status): self
    {
        $this->ftthLineTestLineStatus = $status?->value;
        return $this;
    }

    // ───────── MacAddresses ─────────

    public function getMacAddresses(): ?string
    {
        return $this->macAddresses;
    }

    public function setMacAddresses(?string $macAddresses): self
    {
        $this->macAddresses = $macAddresses;
        return $this;
    }

    // ───────── TechnologyType ─────────

    public function getFtthLineTestTechnologyType(): ?string
    {
        return $this->ftthLineTestTechnologyType;
    }

    public function setFtthLineTestTechnologyType(?string $type): self
    {
        $this->ftthLineTestTechnologyType = $type;
        return $this;
    }

    public function getFtthLineTestTechnologyTypeEnum(): ?FtthLineTestTechnologyType
    {
        return $this->ftthLineTestTechnologyType !== null
            ? FtthLineTestTechnologyType::tryFrom($this->ftthLineTestTechnologyType)
            : null;
    }

    public function setFtthLineTestTechnologyTypeEnum(?FtthLineTestTechnologyType $type): self
    {
        $this->ftthLineTestTechnologyType = $type?->value;
        return $this;
    }

    // ───────── Vlans ─────────

    public function getVlans(): ?string
    {
        return $this->vlans;
    }

    public function setVlans(?string $vlans): self
    {
        $this->vlans = $vlans;
        return $this;
    }
}