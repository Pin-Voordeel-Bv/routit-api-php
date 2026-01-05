<?php

namespace Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class PortInformation
{
    #[SerializedName('PortSpeed')]
    private int $portSpeed;

    #[SerializedName('ConnectionSpeedUnit')]
    private string $connectionSpeedUnit; // Mbps/Gbps/Kbps

    #[SerializedName('InterfaceType')]
    private string $interfaceType; // Electric/OpticalMM/OpticalSM

    #[SerializedName('AutoNegotiate')]
    private ?bool $autoNegotiate = null;

    public function getPortSpeed(): int
    {
        return $this->portSpeed;
    }

    public function setPortSpeed(int $portSpeed): self
    {
        $this->portSpeed = $portSpeed;
        return $this;
    }

    public function getConnectionSpeedUnit(): string
    {
        return $this->connectionSpeedUnit;
    }

    public function setConnectionSpeedUnit(string $unit): self
    {
        $this->connectionSpeedUnit = $unit;
        return $this;
    }

    public function getInterfaceType(): string
    {
        return $this->interfaceType;
    }

    public function setInterfaceType(string $type): self
    {
        $this->interfaceType = $type;
        return $this;
    }

    public function getAutoNegotiate(): ?bool
    {
        return $this->autoNegotiate;
    }

    public function setAutoNegotiate(?bool $autoNegotiate): self
    {
        $this->autoNegotiate = $autoNegotiate;
        return $this;
    }
}