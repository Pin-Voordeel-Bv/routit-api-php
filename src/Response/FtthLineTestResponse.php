<?php

namespace Inserve\RoutITAPI\Response\Ftth;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class FtthLineTestResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('ServiceInstance')]
    private ?string $serviceInstance = null;

    #[SerializedName('DateCreated')]
    private ?DateTimeImmutable $dateCreated = null;

    #[SerializedName('DateCompleted')]
    private ?DateTimeImmutable $dateCompleted = null;

    #[SerializedName('FtthLineTestResult')]
    private ?FtthLineTestResult $ftthLineTestResult = null;

    // ─────────── helpers for dateTime ───────────

    private function normalizeDateTime(DateTimeInterface|string|null $value): ?DateTimeImmutable
    {
        if ($value instanceof DateTimeInterface) {
            return DateTimeImmutable::createFromInterface($value);
        }

        if (is_string($value) && $value !== '') {
            try {
                return new DateTimeImmutable($value);
            } catch (Exception) {
                return null;
            }
        }

        return null;
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

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    // ───────── ServiceInstance ─────────

    public function getServiceInstance(): ?string
    {
        return $this->serviceInstance;
    }

    public function setServiceInstance(?string $serviceInstance): self
    {
        $this->serviceInstance = $serviceInstance;
        return $this;
    }

    // ───────── DateCreated ─────────

    public function getDateCreated(): ?DateTimeImmutable
    {
        return $this->dateCreated;
    }

    public function setDateCreated(DateTimeInterface|string|null $dateCreated): self
    {
        $this->dateCreated = $this->normalizeDateTime($dateCreated);
        return $this;
    }

    // ───────── DateCompleted ─────────

    public function getDateCompleted(): ?DateTimeImmutable
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(DateTimeInterface|string|null $dateCompleted): self
    {
        $this->dateCompleted = $this->normalizeDateTime($dateCompleted);
        return $this;
    }

    // ───────── FtthLineTestResult ─────────

    public function getFtthLineTestResult(): ?FtthLineTestResult
    {
        return $this->ftthLineTestResult;
    }

    public function setFtthLineTestResult(?FtthLineTestResult $ftthLineTestResult): self
    {
        $this->ftthLineTestResult = $ftthLineTestResult;
        return $this;
    }
}