<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltDownstream
{
    #[SerializedName('AtmTrafficRateDown')]
    private ?float $atmTrafficRateDown = null;

    #[SerializedName('AttenuationDown')]
    private ?float $attenuationDown = null;

    #[SerializedName('ContractDown')]
    private ?int $contractDown = null;

    #[SerializedName('ActualBitrateDown')]
    private ?float $actualBitrateDown = null;

    #[SerializedName('ActualPsdDown')]
    private ?float $actualPsdDown = null;

    #[SerializedName('AttainableBitrateDown')]
    private ?float $attainableBitrateDown = null;

    #[SerializedName('LoopAttenuationDown')]
    private ?float $loopAttenuationDown = null;

    #[SerializedName('NoiseMarginDown')]
    private ?float $noiseMarginDown = null;

    #[SerializedName('PowerDown')]
    private ?float $powerDown = null;

    #[SerializedName('RelativeCapacityDown')]
    private ?float $relativeCapacityDown = null;

    private function nf(float|int|string|null $v): ?float
    {
        if ($v === null || $v === '') return null;
        return (float)$v;
    }

    private function ni(int|string|null $v): ?int
    {
        if ($v === null || $v === '') return null;
        return (int)$v;
    }

    public function getAtmTrafficRateDown(): ?float { return $this->atmTrafficRateDown; }
    public function setAtmTrafficRateDown(float|int|string|null $v): self { $this->atmTrafficRateDown = $this->nf($v); return $this; }

    public function getAttenuationDown(): ?float { return $this->attenuationDown; }
    public function setAttenuationDown(float|int|string|null $v): self { $this->attenuationDown = $this->nf($v); return $this; }

    public function getContractDown(): ?int { return $this->contractDown; }
    public function setContractDown(int|string|null $v): self { $this->contractDown = $this->ni($v); return $this; }

    public function getActualBitrateDown(): ?float { return $this->actualBitrateDown; }
    public function setActualBitrateDown(float|int|string|null $v): self { $this->actualBitrateDown = $this->nf($v); return $this; }

    public function getActualPsdDown(): ?float { return $this->actualPsdDown; }
    public function setActualPsdDown(float|int|string|null $v): self { $this->actualPsdDown = $this->nf($v); return $this; }

    public function getAttainableBitrateDown(): ?float { return $this->attainableBitrateDown; }
    public function setAttainableBitrateDown(float|int|string|null $v): self { $this->attainableBitrateDown = $this->nf($v); return $this; }

    public function getLoopAttenuationDown(): ?float { return $this->loopAttenuationDown; }
    public function setLoopAttenuationDown(float|int|string|null $v): self { $this->loopAttenuationDown = $this->nf($v); return $this; }

    public function getNoiseMarginDown(): ?float { return $this->noiseMarginDown; }
    public function setNoiseMarginDown(float|int|string|null $v): self { $this->noiseMarginDown = $this->nf($v); return $this; }

    public function getPowerDown(): ?float { return $this->powerDown; }
    public function setPowerDown(float|int|string|null $v): self { $this->powerDown = $this->nf($v); return $this; }

    public function getRelativeCapacityDown(): ?float { return $this->relativeCapacityDown; }
    public function setRelativeCapacityDown(float|int|string|null $v): self { $this->relativeCapacityDown = $this->nf($v); return $this; }
}