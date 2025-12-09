<?php

namespace Inserve\RoutITAPI\Response\FiberOrderResponse;

use Inserve\RoutITAPI\Enum\DonorWsoCode;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * FiberMigrationData_V1 (response)
 */
final class FiberMigrationData
{
    #[SerializedName('AccessId')]
    private ?string $accessId = null;

    #[SerializedName('DonorWsoCode')]
    private ?DonorWsoCode $donorWsoCode = null;

    #[SerializedName('IsDuringOfficeHours')]
    private ?bool $isDuringOfficeHours = null;

    #[SerializedName('CompanyName')]
    private ?string $companyName = null;

    public function getAccessId(): ?string
    {
        return $this->accessId;
    }

    public function setAccessId(?string $accessId): self
    {
        $this->accessId = $accessId;
        return $this;
    }

    public function getDonorWsoCode(): ?DonorWsoCode
    {
        return $this->donorWsoCode;
    }

    /**
     * @param DonorWsoCode|string|null $donorWsoCode
     */
    public function setDonorWsoCode(DonorWsoCode|string|null $donorWsoCode): self
    {
        if ($donorWsoCode instanceof DonorWsoCode) {
            $this->donorWsoCode = $donorWsoCode;
            return $this;
        }

        // Convert plain XML string → enum
        if (is_string($donorWsoCode) && $donorWsoCode !== '') {
            $this->donorWsoCode = DonorWsoCode::tryFrom($donorWsoCode);
            return $this;
        }

        $this->donorWsoCode = null;
        return $this;
    }

    public function isDuringOfficeHours(): ?bool
    {
        return $this->isDuringOfficeHours;
    }

    public function setIsDuringOfficeHours(?bool $isDuringOfficeHours): self
    {
        $this->isDuringOfficeHours = $isDuringOfficeHours;
        return $this;
    }

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
