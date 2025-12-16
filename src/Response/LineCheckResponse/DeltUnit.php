<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltUnit
{
    #[SerializedName('ActualBitrateUnit')] private ?string $actualBitrateUnit = null;
    #[SerializedName('ActualPsdUnit')] private ?string $actualPsdUnit = null;
    #[SerializedName('AtmTrafficRateUnit')] private ?string $atmTrafficRateUnit = null;
    #[SerializedName('AttainableBitrateUnit')] private ?string $attainableBitrateUnit = null;
    #[SerializedName('AttenuationUnit')] private ?string $attenuationUnit = null;
    #[SerializedName('LoopAttenuationUnit')] private ?string $loopAttenuationUnit = null;
    #[SerializedName('NoiseMarginUnit')] private ?string $noiseMarginUnit = null;
    #[SerializedName('PowerUnit')] private ?string $powerUnit = null;
    #[SerializedName('RelativeCapacityUnit')] private ?string $relativeCapacityUnit = null;

    public function getActualBitrateUnit(): ?string { return $this->actualBitrateUnit; }
    public function setActualBitrateUnit(?string $v): self { $this->actualBitrateUnit = $v; return $this; }

    public function getActualPsdUnit(): ?string { return $this->actualPsdUnit; }
    public function setActualPsdUnit(?string $v): self { $this->actualPsdUnit = $v; return $this; }

    public function getAtmTrafficRateUnit(): ?string { return $this->atmTrafficRateUnit; }
    public function setAtmTrafficRateUnit(?string $v): self { $this->atmTrafficRateUnit = $v; return $this; }

    public function getAttainableBitrateUnit(): ?string { return $this->attainableBitrateUnit; }
    public function setAttainableBitrateUnit(?string $v): self { $this->attainableBitrateUnit = $v; return $this; }

    public function getAttenuationUnit(): ?string { return $this->attenuationUnit; }
    public function setAttenuationUnit(?string $v): self { $this->attenuationUnit = $v; return $this; }

    public function getLoopAttenuationUnit(): ?string { return $this->loopAttenuationUnit; }
    public function setLoopAttenuationUnit(?string $v): self { $this->loopAttenuationUnit = $v; return $this; }

    public function getNoiseMarginUnit(): ?string { return $this->noiseMarginUnit; }
    public function setNoiseMarginUnit(?string $v): self { $this->noiseMarginUnit = $v; return $this; }

    public function getPowerUnit(): ?string { return $this->powerUnit; }
    public function setPowerUnit(?string $v): self { $this->powerUnit = $v; return $this; }

    public function getRelativeCapacityUnit(): ?string { return $this->relativeCapacityUnit; }
    public function setRelativeCapacityUnit(?string $v): self { $this->relativeCapacityUnit = $v; return $this; }
}