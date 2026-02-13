<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\LineDiagnoseResponse\LineDiagnoseResult;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LineDiagnoseResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('ErrorMessage')]
    private ?string $errorMessage = null;

    #[SerializedName('LineDiagnoseResult')]
    private ?LineDiagnoseResult $lineDiagnoseResult = null;

    // ───────── Header ─────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    // ───────── OrderId ─────────

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    // ───────── ErrorMessage ─────────

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(?string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    // ───────── LineDiagnoseResult ─────────

    public function getLineDiagnoseResult(): ?LineDiagnoseResult
    {
        return $this->lineDiagnoseResult;
    }

    public function setLineDiagnoseResult(?LineDiagnoseResult $result): self
    {
        $this->lineDiagnoseResult = $result;
        return $this;
    }
}