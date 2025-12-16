<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltDslamPortInfo
{
    #[SerializedName('Rtx')]
    private ?DeltRtx $rtx = null;

    #[SerializedName('Vectoring')]
    private ?DeltVectoring $vectoring = null;

    #[SerializedName('ConnectionStatus')] private ?string $connectionStatus = null;
    #[SerializedName('DslType')] private ?string $dslType = null;
    #[SerializedName('LineId')] private ?string $lineId = null;
    #[SerializedName('LineCardType')] private ?string $lineCardType = null;
    #[SerializedName('LineQuality')] private ?string $lineQuality = null;

    #[SerializedName('OutputPower')]
    private ?float $outputPower = null;

    #[SerializedName('UserLabel')] private ?string $userLabel = null;
    #[SerializedName('VirtualProfile')] private ?string $virtualProfile = null;
    #[SerializedName('ClassificationHistoryUrls')] private ?string $classificationHistoryUrls = null;

    #[SerializedName('EstimatedDeltDistance')]
    private ?int $estimatedDeltDistance = null;

    #[SerializedName('LastStatusChange')]
    private ?DateTimeImmutable $lastStatusChange = null;

    #[SerializedName('LineLength')]
    private ?int $lineLength = null;

    #[SerializedName('LineUp')] private ?string $lineUp = null;
    #[SerializedName('ReSyncSupported')] private ?string $reSyncSupported = null;
    #[SerializedName('SeltSupported')] private ?string $seltSupported = null;
    #[SerializedName('ServiceProfileName')] private ?string $serviceProfileName = null;
    #[SerializedName('ServiceStability')] private ?string $serviceStability = null;
    #[SerializedName('ServiceTemplateName')] private ?string $serviceTemplateName = null;
    #[SerializedName('SpectrumProfileName')] private ?string $spectrumProfileName = null;

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

    private function ndt(DateTimeInterface|string|null $v): ?DateTimeImmutable
    {
        if ($v instanceof DateTimeInterface) return DateTimeImmutable::createFromInterface($v);
        if (is_string($v) && $v !== '') {
            try { return new DateTimeImmutable($v); } catch (Exception) { return null; }
        }
        return null;
    }

    public function getRtx(): ?DeltRtx { return $this->rtx; }
    public function setRtx(?DeltRtx $v): self { $this->rtx = $v; return $this; }

    public function getVectoring(): ?DeltVectoring { return $this->vectoring; }
    public function setVectoring(?DeltVectoring $v): self { $this->vectoring = $v; return $this; }

    public function getConnectionStatus(): ?string { return $this->connectionStatus; }
    public function setConnectionStatus(?string $v): self { $this->connectionStatus = $v; return $this; }

    public function getDslType(): ?string { return $this->dslType; }
    public function setDslType(?string $v): self { $this->dslType = $v; return $this; }

    public function getLineId(): ?string { return $this->lineId; }
    public function setLineId(?string $v): self { $this->lineId = $v; return $this; }

    public function getLineCardType(): ?string { return $this->lineCardType; }
    public function setLineCardType(?string $v): self { $this->lineCardType = $v; return $this; }

    public function getLineQuality(): ?string { return $this->lineQuality; }
    public function setLineQuality(?string $v): self { $this->lineQuality = $v; return $this; }

    public function getOutputPower(): ?float { return $this->outputPower; }
    public function setOutputPower(float|int|string|null $v): self { $this->outputPower = $this->nf($v); return $this; }

    public function getUserLabel(): ?string { return $this->userLabel; }
    public function setUserLabel(?string $v): self { $this->userLabel = $v; return $this; }

    public function getVirtualProfile(): ?string { return $this->virtualProfile; }
    public function setVirtualProfile(?string $v): self { $this->virtualProfile = $v; return $this; }

    public function getClassificationHistoryUrls(): ?string { return $this->classificationHistoryUrls; }
    public function setClassificationHistoryUrls(?string $v): self { $this->classificationHistoryUrls = $v; return $this; }

    public function getEstimatedDeltDistance(): ?int { return $this->estimatedDeltDistance; }
    public function setEstimatedDeltDistance(int|string|null $v): self { $this->estimatedDeltDistance = $this->ni($v); return $this; }

    public function getLastStatusChange(): ?DateTimeImmutable { return $this->lastStatusChange; }
    public function setLastStatusChange(DateTimeInterface|string|null $v): self { $this->lastStatusChange = $this->ndt($v); return $this; }

    public function getLineLength(): ?int { return $this->lineLength; }
    public function setLineLength(int|string|null $v): self { $this->lineLength = $this->ni($v); return $this; }

    public function getLineUp(): ?string { return $this->lineUp; }
    public function setLineUp(?string $v): self { $this->lineUp = $v; return $this; }

    public function getReSyncSupported(): ?string { return $this->reSyncSupported; }
    public function setReSyncSupported(?string $v): self { $this->reSyncSupported = $v; return $this; }

    public function getSeltSupported(): ?string { return $this->seltSupported; }
    public function setSeltSupported(?string $v): self { $this->seltSupported = $v; return $this; }

    public function getServiceProfileName(): ?string { return $this->serviceProfileName; }
    public function setServiceProfileName(?string $v): self { $this->serviceProfileName = $v; return $this; }

    public function getServiceStability(): ?string { return $this->serviceStability; }
    public function setServiceStability(?string $v): self { $this->serviceStability = $v; return $this; }

    public function getServiceTemplateName(): ?string { return $this->serviceTemplateName; }
    public function setServiceTemplateName(?string $v): self { $this->serviceTemplateName = $v; return $this; }

    public function getSpectrumProfileName(): ?string { return $this->spectrumProfileName; }
    public function setSpectrumProfileName(?string $v): self { $this->spectrumProfileName = $v; return $this; }
}