<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltUpstream
{
    #[SerializedName('AtmTrafficRateUp')]
    private ?float $atmTrafficRateUp = null;

    #[SerializedName('AttenuationUp')]
    private ?float $attenuationUp = null;

    #[SerializedName('ContractUp')]
    private ?int $contractUp = null;

    #[SerializedName('ActualBitrateUp')]
    private ?float $actualBitrateUp = null;

    #[SerializedName('ActualPsdUp')]
    private ?float $actualPsdUp = null;

    #[SerializedName('AttainableBitrateUp')]
    private ?float $attainableBitrateUp = null;

    #[SerializedName('LoopAttenuationUp')]
    private ?float $loopAttenuationUp = null;

    #[SerializedName('NoiseMarginUp')]
    private ?float $noiseMarginUp = null;

    #[SerializedName('PowerUp')]
    private ?float $powerUp = null;

    #[SerializedName('RelativeCapacityUp')]
    private ?float $relativeCapacityUp = null;

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

    public function getAtmTrafficRateUp(): ?float { return $this->atmTrafficRateUp; }
    public function setAtmTrafficRateUp(float|int|string|null $v): self { $this->atmTrafficRateUp = $this->nf($v); return $this; }

    public function getAttenuationUp(): ?float { return $this->attenuationUp; }
    public function setAttenuationUp(float|int|string|null $v): self { $this->attenuationUp = $this->nf($v); return $this; }

    public function getContractUp(): ?int { return $this->contractUp; }
    public function setContractUp(int|string|null $v): self { $this->contractUp = $this->ni($v); return $this; }

    public function getActualBitrateUp(): ?float { return $this->actualBitrateUp; }
    public function setActualBitrateUp(float|int|string|null $v): self { $this->actualBitrateUp = $this->nf($v); return $this; }

    public function getActualPsdUp(): ?float { return $this->actualPsdUp; }
    public function setActualPsdUp(float|int|string|null $v): self { $this->actualPsdUp = $this->nf($v); return $this; }

    public function getAttainableBitrateUp(): ?float { return $this->attainableBitrateUp; }
    public function setAttainableBitrateUp(float|int|string|null $v): self { $this->attainableBitrateUp = $this->nf($v); return $this; }

    public function getLoopAttenuationUp(): ?float { return $this->loopAttenuationUp; }
    public function setLoopAttenuationUp(float|int|string|null $v): self { $this->loopAttenuationUp = $this->nf($v); return $this; }

    public function getNoiseMarginUp(): ?float { return $this->noiseMarginUp; }
    public function setNoiseMarginUp(float|int|string|null $v): self { $this->noiseMarginUp = $this->nf($v); return $this; }

    public function getPowerUp(): ?float { return $this->powerUp; }
    public function setPowerUp(float|int|string|null $v): self { $this->powerUp = $this->nf($v); return $this; }

    public function getRelativeCapacityUp(): ?float { return $this->relativeCapacityUp; }
    public function setRelativeCapacityUp(float|int|string|null $v): self { $this->relativeCapacityUp = $this->nf($v); return $this; }
}