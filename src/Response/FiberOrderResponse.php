<?php

namespace Inserve\RoutITAPI\Response;

use DateTimeImmutable;
use DateTimeInterface;
use Inserve\RoutITAPI\Response\FiberOrderResponse\FiberMigrationData;
use Inserve\RoutITAPI\Response\FiberOrderResponse\FullAddress;
use Inserve\RoutITAPI\Response\FiberOrderResponse\VlanFiberOrderResponseData
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * FiberOrderResponseData_V1
 */
final class FiberOrderResponse
{
    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('ServiceId')]
    private ?string $serviceId = null;

    #[SerializedName('ServiceOrderId')]
    private ?string $serviceOrderId = null;

    #[SerializedName('ServiceInstance')]
    private ?string $serviceInstance = null;

    #[SerializedName('Address')]
    private ?FullAddress $address = null;

    #[SerializedName('Company')]
    private ?string $company = null;

    #[SerializedName('ContactPersonName')]
    private ?string $contactPersonName = null;

    #[SerializedName('ContactPersonPhoneNumber')]
    private ?string $contactPersonPhoneNumber = null;

    #[SerializedName('ContactPersonEmailAddress')]
    private ?string $contactPersonEmailAddress = null;

    #[SerializedName('PlanDate')]
    private ?DateTimeImmutable $planDate = null;

    #[SerializedName('DistanceClassification')]
    private ?string $distanceClassification = null;

    #[SerializedName('Nls')]
    private ?int $nls = null;

    #[SerializedName('FirstVlan')]
    private ?VlanFiberOrderResponseData $firstVlan = null;

    #[SerializedName('FiberMigrationData')]
    private ?FiberMigrationData $fiberMigrationData = null;

    // ─────────── OrderId ───────────

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    // ─────────── ServiceId ───────────

    public function getServiceId(): ?string
    {
        return $this->serviceId;
    }

    public function setServiceId(?string $serviceId): self
    {
        $this->serviceId = $serviceId;
        return $this;
    }

    // ─────────── ServiceOrderId ───────────

    public function getServiceOrderId(): ?string
    {
        return $this->serviceOrderId;
    }

    public function setServiceOrderId(?string $serviceOrderId): self
    {
        $this->serviceOrderId = $serviceOrderId;
        return $this;
    }

    // ─────────── ServiceInstance (Access Id) ───────────

    public function getServiceInstance(): ?string
    {
        return $this->serviceInstance;
    }

    public function setServiceInstance(?string $serviceInstance): self
    {
        $this->serviceInstance = $serviceInstance;
        return $this;
    }

    // ─────────── Address ───────────

    public function getAddress(): ?FullAddress
    {
        return $this->address;
    }

    public function setAddress(?FullAddress $address): self
    {
        $this->address = $address;
        return $this;
    }

    // ─────────── Company ───────────

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;
        return $this;
    }

    // ─────────── ContactPersonName ───────────

    public function getContactPersonName(): ?string
    {
        return $this->contactPersonName;
    }

    public function setContactPersonName(?string $contactPersonName): self
    {
        $this->contactPersonName = $contactPersonName;
        return $this;
    }

    // ─────────── ContactPersonPhoneNumber ───────────

    public function getContactPersonPhoneNumber(): ?string
    {
        return $this->contactPersonPhoneNumber;
    }

    public function setContactPersonPhoneNumber(?string $contactPersonPhoneNumber): self
    {
        $this->contactPersonPhoneNumber = $contactPersonPhoneNumber;
        return $this;
    }

    // ─────────── ContactPersonEmailAddress ───────────

    public function getContactPersonEmailAddress(): ?string
    {
        return $this->contactPersonEmailAddress;
    }

    public function setContactPersonEmailAddress(?string $contactPersonEmailAddress): self
    {
        $this->contactPersonEmailAddress = $contactPersonEmailAddress;
        return $this;
    }

    // ─────────── PlanDate (xs:dateTime) ───────────

    public function getPlanDate(): ?DateTimeImmutable
    {
        return $this->planDate;
    }

    /**
     * @param DateTimeInterface|string|null $planDate
     */
    public function setPlanDate(DateTimeInterface|string|null $planDate): self
    {
        if ($planDate instanceof DateTimeInterface) {
            $this->planDate = DateTimeImmutable::createFromInterface($planDate);
            return $this;
        }

        if (is_string($planDate) && $planDate !== '') {
            $this->planDate = new DateTimeImmutable($planDate);
        } else {
            $this->planDate = null;
        }

        return $this;
    }

    // ─────────── DistanceClassification ───────────

    public function getDistanceClassification(): ?string
    {
        return $this->distanceClassification;
    }

    public function setDistanceClassification(?string $distanceClassification): self
    {
        $this->distanceClassification = $distanceClassification;
        return $this;
    }

    // ─────────── Nls ───────────

    public function getNls(): ?int
    {
        return $this->nls;
    }

    public function setNls(?int $nls): self
    {
        $this->nls = $nls;
        return $this;
    }

    // ─────────── FirstVlan ───────────

    public function getFirstVlan(): ?VlanFiberOrderResponseData
    {
        return $this->firstVlan;
    }

    public function setFirstVlan(?VlanFiberOrderResponseData $firstVlan): self
    {
        $this->firstVlan = $firstVlan;
        return $this;
    }

    // ─────────── FiberMigrationData ───────────

    public function getFiberMigrationData(): ?FiberMigrationData
    {
        return $this->fiberMigrationData;
    }

    public function setFiberMigrationData(?FiberMigrationData $fiberMigrationData): self
    {
        $this->fiberMigrationData = $fiberMigrationData;
        return $this;
    }
}