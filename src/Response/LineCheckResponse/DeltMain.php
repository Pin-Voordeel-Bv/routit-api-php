<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltMain
{
    #[SerializedName('Measurement')]
    private ?DeltMeasurement $measurement = null;

    #[SerializedName('Meta')]
    private ?DeltMeta $meta = null;

    #[SerializedName('DslamPortInfo')]
    private ?DeltDslamPortInfo $dslamPortInfo = null;

    #[SerializedName('Problem')]
    private ?DeltProblem $problem = null;

    #[SerializedName('Error')]
    private ?string $error = null;

    public function getMeasurement(): ?DeltMeasurement { return $this->measurement; }
    public function setMeasurement(?DeltMeasurement $measurement): self { $this->measurement = $measurement; return $this; }

    public function getMeta(): ?DeltMeta { return $this->meta; }
    public function setMeta(?DeltMeta $meta): self { $this->meta = $meta; return $this; }

    public function getDslamPortInfo(): ?DeltDslamPortInfo { return $this->dslamPortInfo; }
    public function setDslamPortInfo(?DeltDslamPortInfo $info): self { $this->dslamPortInfo = $info; return $this; }

    public function getProblem(): ?DeltProblem { return $this->problem; }
    public function setProblem(?DeltProblem $problem): self { $this->problem = $problem; return $this; }

    public function getError(): ?string { return $this->error; }
    public function setError(?string $error): self { $this->error = $error; return $this; }
}