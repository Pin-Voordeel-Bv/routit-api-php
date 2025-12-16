<?php

namespace Inserve\RoutITAPI\Response\LineCheck;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\LineCheckResponse\DeltResponse;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LineCheckResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('ErrorMessage')]
    private ?string $errorMessage = null;

    #[SerializedName('DeltResponse')]
    private ?DeltResponse $deltResponse = null;

    // ───────── helpers ─────────

    private function normalizeInt(int|string|null $value): ?int
    {
        if ($value === null || $value === '') return null;
        return (int)$value;
    }

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

    public function setOrderId(int|string|null $orderId): self
    {
        $this->orderId = $this->normalizeInt($orderId);
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

    // ───────── DeltResponse ─────────

    public function getDeltResponse(): ?DeltResponse
    {
        return $this->deltResponse;
    }

    public function setDeltResponse(?DeltResponse $deltResponse): self
    {
        $this->deltResponse = $deltResponse;
        return $this;
    }
}