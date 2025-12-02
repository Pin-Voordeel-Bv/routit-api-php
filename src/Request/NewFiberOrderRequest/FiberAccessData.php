<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class FiberAccessData
{
    #[SerializedName('ServiceId')]
    private ?string $serviceId = null;

    #[SerializedName('CustomerWishDate')]
    private ?string $customerWishDate = null;

    #[SerializedName('CpeType')]
    private ?string $cpeType = null;

    #[SerializedName('CkrAccess')]
    private ?string $ckrAccess = null;

    #[SerializedName('EanId')]
    private ?string $eanId = null;

    #[SerializedName('FiberQuotationId')]
    private ?int $fiberQuotationId = null;

    // ───────── ServiceId ─────────

    public function getServiceId(): ?string
    {
        return $this->serviceId;
    }

    public function setServiceId(?string $serviceId): self
    {
        $this->serviceId = $serviceId;
        return $this;
    }

    // ───────── CustomerWishDate ─────────

    public function getCustomerWishDate(): ?string 
    {
        return $this->customerWishDate;
    }

    /**
     * Accepts either a DateTime or a string.
     * The API expects xs:dateTime (e.g. 2025-12-20T00:00:00).
     */
    public function setCustomerWishDate(DateTimeInterface|string|null $customerWishDate): self
    {
        if ($customerWishDate instanceof DateTimeInterface) {
            // Full xs:dateTime without nested timezone node
            $this->customerWishDate = $customerWishDate->format('Y-m-d\TH:i:s');
        } elseif (is_string($customerWishDate) && $customerWishDate !== '') {
            // If user passes only a date, add midnight
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $customerWishDate)) {
                $this->customerWishDate = $customerWishDate . 'T00:00:00';
            } else {
                // Assume they already passed a valid dateTime string
                $this->customerWishDate = $customerWishDate;
            }
        } else {
            $this->customerWishDate = null;
        }

        return $this;
    }

    // ───────── CpeType ─────────

    public function getCpeType(): ?string
    {
        return $this->cpeType;
    }

    public function setCpeType(?string $cpeType): self
    {
        $this->cpeType = $cpeType;
        return $this;
    }

    // ───────── CkrAccess ─────────

    public function getCkrAccess(): ?string
    {
        return $this->ckrAccess;
    }

    public function setCkrAccess(?string $ckrAccess): self
    {
        $this->ckrAccess = $ckrAccess;
        return $this;
    }

    // ───────── EanId ─────────

    public function getEanId(): ?string
    {
        return $this->eanId;
    }

    public function setEanId(?string $eanId): self
    {
        $this->eanId = $eanId;
        return $this;
    }

    // ───────── FiberQuotationId ─────────

    public function getFiberQuotationId(): ?int
    {
        return $this->fiberQuotationId;
    }

    public function setFiberQuotationId(?int $fiberQuotationId): self
    {
        $this->fiberQuotationId = $fiberQuotationId;
        return $this;
    }
}