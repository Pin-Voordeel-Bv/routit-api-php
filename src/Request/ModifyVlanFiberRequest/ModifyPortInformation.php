<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;

use Inserve\RoutITAPI\Enum\Request\ModifyVlanFiberRequest\ConnectionSpeedUnit; // if you already have this enum
use Inserve\RoutITAPI\Validation\Validator;
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

    public function validate(): array
    {
        $errors = [];

        // @TODO: is there assertRequiredFieldsPresent needed?

        Validator::assertInitializedInt($this, 'portSpeed', $errors);
        Validator::assertRequiredEnum($this->connectionSpeedUnit ?? null, ['Mbps', 'Gbps', 'Kbps'], 'ConnectionSpeedUnit', $errors);
        Validator::assertInitializedBoolean($this, 'autoNegotiate', $errors);

        return $errors;
    }

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