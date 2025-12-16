<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltMeasurement
{
    #[SerializedName('Cpe')]
    private ?DeltCpe $cpe = null;

    #[SerializedName('Downstream')]
    private ?DeltDownstream $downstream = null;

    #[SerializedName('Unit')]
    private ?DeltUnit $unit = null;

    #[SerializedName('Upstream')]
    private ?DeltUpstream $upstream = null;

    public function getCpe(): ?DeltCpe { return $this->cpe; }
    public function setCpe(?DeltCpe $cpe): self { $this->cpe = $cpe; return $this; }

    public function getDownstream(): ?DeltDownstream { return $this->downstream; }
    public function setDownstream(?DeltDownstream $downstream): self { $this->downstream = $downstream; return $this; }

    public function getUnit(): ?DeltUnit { return $this->unit; }
    public function setUnit(?DeltUnit $unit): self { $this->unit = $unit; return $this; }

    public function getUpstream(): ?DeltUpstream { return $this->upstream; }
    public function setUpstream(?DeltUpstream $upstream): self { $this->upstream = $upstream; return $this; }
}