<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltMeta
{
    #[SerializedName('AdviceCode')]
    private ?int $adviceCode = null;

    #[SerializedName('AdviceText')]
    private ?string $adviceText = null;

    #[SerializedName('InspectionId')]
    private ?int $inspectionId = null;

    private function ni(int|string|null $v): ?int
    {
        if ($v === null || $v === '') return null;
        return (int)$v;
    }

    public function getAdviceCode(): ?int { return $this->adviceCode; }
    public function setAdviceCode(int|string|null $v): self { $this->adviceCode = $this->ni($v); return $this; }

    public function getAdviceText(): ?string { return $this->adviceText; }
    public function setAdviceText(?string $v): self { $this->adviceText = $v; return $this; }

    public function getInspectionId(): ?int { return $this->inspectionId; }
    public function setInspectionId(int|string|null $v): self { $this->inspectionId = $this->ni($v); return $this; }
}