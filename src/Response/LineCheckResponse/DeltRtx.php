<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltRtx
{
    #[SerializedName('RtxDownstreamDelay')]
    private ?float $rtxDownstreamDelay = null;

    #[SerializedName('RtxDownstreamMode')]
    private ?string $rtxDownstreamMode = null;

    #[SerializedName('RtxFallbackProfile')]
    private ?string $rtxFallbackProfile = null;

    #[SerializedName('RtxProfile')]
    private ?string $rtxProfile = null;

    #[SerializedName('RtxUpstreamDelay')]
    private ?float $rtxUpstreamDelay = null;

    #[SerializedName('RtxUpstreamMode')]
    private ?string $rtxUpstreamMode = null;

    private function nf(float|int|string|null $v): ?float
    {
        if ($v === null || $v === '') return null;
        return (float)$v;
    }

    public function getRtxDownstreamDelay(): ?float { return $this->rtxDownstreamDelay; }
    public function setRtxDownstreamDelay(float|int|string|null $v): self { $this->rtxDownstreamDelay = $this->nf($v); return $this; }

    public function getRtxDownstreamMode(): ?string { return $this->rtxDownstreamMode; }
    public function setRtxDownstreamMode(?string $v): self { $this->rtxDownstreamMode = $v; return $this; }

    public function getRtxFallbackProfile(): ?string { return $this->rtxFallbackProfile; }
    public function setRtxFallbackProfile(?string $v): self { $this->rtxFallbackProfile = $v; return $this; }

    public function getRtxProfile(): ?string { return $this->rtxProfile; }
    public function setRtxProfile(?string $v): self { $this->rtxProfile = $v; return $this; }

    public function getRtxUpstreamDelay(): ?float { return $this->rtxUpstreamDelay; }
    public function setRtxUpstreamDelay(float|int|string|null $v): self { $this->rtxUpstreamDelay = $this->nf($v); return $this; }

    public function getRtxUpstreamMode(): ?string { return $this->rtxUpstreamMode; }
    public function setRtxUpstreamMode(?string $v): self { $this->rtxUpstreamMode = $v; return $this; }
}