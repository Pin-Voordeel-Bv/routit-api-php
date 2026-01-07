<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;

use Inserve\RoutITAPI\Enum\Request\ModifyVlanFiberRequest\ConnectionSpeedUnit; // if you already have this enum
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyPortInformation
{
    #[SerializedName('PortSpeed')]
    private ?int $portSpeed = null;

    // serialized as TEXT only
    #[SerializedName('ConnectionSpeedUnit')]
    private ?string $connectionSpeedUnit = null;

    #[SerializedName('AutoNegotiate')]
    private ?bool $autoNegotiate = null;

    public function setPortSpeed(?int $portSpeed): self
    {
        $this->portSpeed = $portSpeed;
        return $this;
    }

    public function setConnectionSpeedUnit(string|ConnectionSpeedUnit|null $unit): self
    {
        $this->connectionSpeedUnit = $unit instanceof ConnectionSpeedUnit ? $unit->value : $unit;
        return $this;
    }

    public function setAutoNegotiate(?bool $autoNegotiate): self
    {
        $this->autoNegotiate = $autoNegotiate;
        return $this;
    }
}