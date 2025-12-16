<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltProblem
{
    #[SerializedName('ProblemConfidence')]
    private ?int $problemConfidence = null;

    #[SerializedName('ProblemDescription')]
    private ?string $problemDescription = null;

    #[SerializedName('ProblemImpact')]
    private ?string $problemImpact = null;

    #[SerializedName('ProblemLocation')]
    private ?string $problemLocation = null;

    private function ni(int|string|null $v): ?int
    {
        if ($v === null || $v === '') return null;
        return (int)$v;
    }

    public function getProblemConfidence(): ?int { return $this->problemConfidence; }
    public function setProblemConfidence(int|string|null $v): self { $this->problemConfidence = $this->ni($v); return $this; }

    public function getProblemDescription(): ?string { return $this->problemDescription; }
    public function setProblemDescription(?string $v): self { $this->problemDescription = $v; return $this; }

    public function getProblemImpact(): ?string { return $this->problemImpact; }
    public function setProblemImpact(?string $v): self { $this->problemImpact = $v; return $this; }

    public function getProblemLocation(): ?string { return $this->problemLocation; }
    public function setProblemLocation(?string $v): self { $this->problemLocation = $v; return $this; }
}