<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltVectoring
{
    #[SerializedName('SupportedVectoringTypes')] private ?string $supportedVectoringTypes = null;
    #[SerializedName('VectoredDownstreamMode')] private ?string $vectoredDownstreamMode = null;
    #[SerializedName('VectoredUpstreamMode')] private ?string $vectoredUpstreamMode = null;
    #[SerializedName('VectoringFallback')] private ?string $vectoringFallback = null;
    #[SerializedName('VectoringProfile')] private ?string $vectoringProfile = null;
    #[SerializedName('VectoringStatus')] private ?string $vectoringStatus = null;
    #[SerializedName('VectoringType')] private ?string $vectoringType = null;

    public function getSupportedVectoringTypes(): ?string { return $this->supportedVectoringTypes; }
    public function setSupportedVectoringTypes(?string $v): self { $this->supportedVectoringTypes = $v; return $this; }

    public function getVectoredDownstreamMode(): ?string { return $this->vectoredDownstreamMode; }
    public function setVectoredDownstreamMode(?string $v): self { $this->vectoredDownstreamMode = $v; return $this; }

    public function getVectoredUpstreamMode(): ?string { return $this->vectoredUpstreamMode; }
    public function setVectoredUpstreamMode(?string $v): self { $this->vectoredUpstreamMode = $v; return $this; }

    public function getVectoringFallback(): ?string { return $this->vectoringFallback; }
    public function setVectoringFallback(?string $v): self { $this->vectoringFallback = $v; return $this; }

    public function getVectoringProfile(): ?string { return $this->vectoringProfile; }
    public function setVectoringProfile(?string $v): self { $this->vectoringProfile = $v; return $this; }

    public function getVectoringStatus(): ?string { return $this->vectoringStatus; }
    public function setVectoringStatus(?string $v): self { $this->vectoringStatus = $v; return $this; }

    public function getVectoringType(): ?string { return $this->vectoringType; }
    public function setVectoringType(?string $v): self { $this->vectoringType = $v; return $this; }
}