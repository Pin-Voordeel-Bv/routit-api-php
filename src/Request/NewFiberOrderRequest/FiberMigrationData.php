<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use Inserve\RoutITAPI\Enum\DonorWsoCode;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class FiberMigrationData
{
    #[SerializedName('AccessId')]
    private ?string $accessId = null;

    #[SerializedName('DonorWsoCode')]
    private ?string $donorWsoCode = null;

    #[SerializedName('IsDuringOfficeHours')]
    private ?bool $isDuringOfficeHours = null;

    #[SerializedName('CompanyName')]
    private ?string $companyName = null;

    // ───────────── AccessId ─────────────
    public function getAccessId(): ?string
    {
        return $this->accessId;
    }

    public function setAccessId(?string $accessId): self
    {
        $this->accessId = $accessId;
        return $this;
    }

    // ───────────── DonorWsoCode ─────────────
    public function getDonorWsoCode(): ?string
    {
        return $this->donorWsoCode;
    }

    // public function setDonorWsoCode(?string $donorWsoCode): self
    // {
    //     $this->donorWsoCode = $donorWsoCode;
    //     return $this;
    // }
    /**
     * @param DonorWsoCode|string|null $portfolio
     */
    public function setDonorWsoCode(DonorWsoCode|string|null $donorWsoCode): self
    {
        if ($donorWsoCode instanceof DonorWsoCode) {
            $this->donorWsoCode = $donorWsoCode->value;
        } else {
            $this->donorWsoCode = $donorWsoCode;
        }

        return $this;
    }
    // ───────────── IsDuringOfficeHours ─────────────
    public function getIsDuringOfficeHours(): ?bool
    {
        return $this->isDuringOfficeHours;
    }

    public function setIsDuringOfficeHours(bool|string|null $isDuringOfficeHours): self
    {
        // Accept "true"/"false" from GET
        if (is_string($isDuringOfficeHours)) {
            $isDuringOfficeHours = strtolower($isDuringOfficeHours) === 'true';
        }

        $this->isDuringOfficeHours = $isDuringOfficeHours;
        return $this;
    }

    // ───────────── CompanyName ─────────────
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }
}