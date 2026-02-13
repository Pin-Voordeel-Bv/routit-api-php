<?php

namespace Inserve\RoutITAPI\Response\LineDiagnoseResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class LineDiagnoseResult
{
    #[SerializedName('AdviceCode')]
    private ?int $adviceCode = null;

    #[SerializedName('AdviceDescription')]
    private ?string $adviceDescription = null;

    #[SerializedName('AnalysisId')]
    private ?string $analysisId = null;

    #[SerializedName('DiagnosisCode')]
    private ?int $diagnosisCode = null;

    #[SerializedName('DiagnosisDescription')]
    private ?string $diagnosisDescription = null;

    public function getAdviceCode(): ?int
    {
        return $this->adviceCode;
    }

    public function setAdviceCode(?int $adviceCode): self
    {
        $this->adviceCode = $adviceCode;
        return $this;
    }

    public function getAdviceDescription(): ?string
    {
        return $this->adviceDescription;
    }

    public function setAdviceDescription(?string $desc): self
    {
        $this->adviceDescription = $desc;
        return $this;
    }

    public function getAnalysisId(): ?string
    {
        return $this->analysisId;
    }

    public function setAnalysisId(?string $analysisId): self
    {
        $this->analysisId = $analysisId;
        return $this;
    }

    public function getDiagnosisCode(): ?int
    {
        return $this->diagnosisCode;
    }

    public function setDiagnosisCode(?int $diagnosisCode): self
    {
        $this->diagnosisCode = $diagnosisCode;
        return $this;
    }

    public function getDiagnosisDescription(): ?string
    {
        return $this->diagnosisDescription;
    }

    public function setDiagnosisDescription(?string $desc): self
    {
        $this->diagnosisDescription = $desc;
        return $this;
    }
}