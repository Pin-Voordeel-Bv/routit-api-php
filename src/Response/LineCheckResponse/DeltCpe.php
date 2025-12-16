<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltCpe
{
    #[SerializedName('CpeType')]
    private ?string $cpeType = null;

    #[SerializedName('ModemVendorId')]
    private ?string $modemVendorId = null;

    #[SerializedName('SystemVendorId')]
    private ?string $systemVendorId = null;

    #[SerializedName('SystemVendorModel')]
    private ?string $systemVendorModel = null;

    public function getCpeType(): ?string { return $this->cpeType; }
    public function setCpeType(?string $v): self { $this->cpeType = $v; return $this; }

    public function getModemVendorId(): ?string { return $this->modemVendorId; }
    public function setModemVendorId(?string $v): self { $this->modemVendorId = $v; return $this; }

    public function getSystemVendorId(): ?string { return $this->systemVendorId; }
    public function setSystemVendorId(?string $v): self { $this->systemVendorId = $v; return $this; }

    public function getSystemVendorModel(): ?string { return $this->systemVendorModel; }
    public function setSystemVendorModel(?string $v): self { $this->systemVendorModel = $v; return $this; }
}