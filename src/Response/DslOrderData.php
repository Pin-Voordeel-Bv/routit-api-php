<?php

namespace Inserve\RoutITAPI\Response;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Inserve\RoutITAPI\Response\DslOrderData\Enum\OnDemandMigrationState;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * DslOrderData_V3
 */
final class DslOrderData
{
    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('FromOrderId')]
    private ?int $fromOrderId = null;

    #[SerializedName('CustomerId')]
    private ?int $customerId = null;

    #[SerializedName('CompanyName')]
    private ?string $companyName = null;

    #[SerializedName('ContactPerson')]
    private ?string $contactPerson = null;

    #[SerializedName('ContactPhoneNumber')]
    private ?string $contactPhoneNumber = null;

    #[SerializedName('HasBroadband')]
    private ?bool $hasBroadband = null;

    #[SerializedName('HasPhone')]
    private ?bool $hasPhone = null;

    #[SerializedName('PhoneNumber')]
    private ?string $phoneNumber = null;

    #[SerializedName('KeepVoice')]
    private ?bool $keepVoice = null;

    #[SerializedName('ServiceID')]
    private ?string $serviceId = null;

    #[SerializedName('IsraSpecs')]
    private ?string $israSpecs = null;

    #[SerializedName('LineType')]
    private ?string $lineType = null;

    #[SerializedName('Label')]
    private ?string $label = null;

    #[SerializedName('ContractStreet')]
    private ?string $contractStreet = null;

    #[SerializedName('ContractHouseNumber')]
    private ?int $contractHouseNumber = null;

    #[SerializedName('ContractHouseNumberExt')]
    private ?string $contractHouseNumberExt = null;

    #[SerializedName('ContractZipCode')]
    private ?string $contractZipCode = null;

    #[SerializedName('ContractCity')]
    private ?string $contractCity = null;

    #[SerializedName('PlanDate')]
    private ?DateTimeImmutable $planDate = null;

    #[SerializedName('NLSLevel')]
    private ?int $nlsLevel = null;

    #[SerializedName('FTU')]
    private ?string $ftu = null;

    /** @var DslChannelData[]|null */
    #[SerializedName('Channels')]
    private ?array $channels = null;

    #[SerializedName('DistributionType')]
    private ?string $distributionType = null;

    #[SerializedName('IsVectoring')]
    private ?bool $isVectoring = null;

    #[SerializedName('AppointmentId')]
    private ?string $appointmentId = null;

    #[SerializedName('UseCustomTechnician')]
    private ?bool $useCustomTechnician = null;

    #[SerializedName('TestAndLabelActivity')]
    private ?bool $testAndLabelActivity = null;

    #[SerializedName('ExistingDSL')]
    private ?bool $existingDsl = null;

    #[SerializedName('CurrentPhoneType')]
    private ?string $currentPhoneType = null;

    #[SerializedName('ReferencePhonenumber')]
    private ?string $referencePhonenumber = null;

    #[SerializedName('MaxNLS')]
    private ?int $maxNls = null;

    #[SerializedName('EAPid')]
    private ?string $eapId = null;

    #[SerializedName('ServiceGroup')]
    private ?string $serviceGroup = null;

    #[SerializedName('AccessID')]
    private ?string $accessId = null;

    #[SerializedName('TrBlockID')]
    private ?string $trBlockId = null;

    #[SerializedName('HoBlockID')]
    private ?string $hoBlockId = null;

    #[SerializedName('DonorTelco')]
    private ?string $donorTelco = null;

    #[SerializedName('OutletRequired')]
    private ?bool $outletRequired = null;

    #[SerializedName('IsRelocation')]
    private ?bool $isRelocation = null;

    #[SerializedName('Dikader')]
    private ?int $dikader = null;

    #[SerializedName('PoIPAvailableOnFirstChannel')]
    private ?bool $poipAvailableOnFirstChannel = null;

    #[SerializedName('ContactEmail')]
    private ?string $contactEmail = null;

    #[SerializedName('Contact2Name')]
    private ?string $contact2Name = null;

    #[SerializedName('Contact2PhoneNumber')]
    private ?string $contact2PhoneNumber = null;

    #[SerializedName('Contact2Email')]
    private ?string $contact2Email = null;

    #[SerializedName('OntSerialNumber')]
    private ?string $ontSerialNumber = null;

    #[SerializedName('NewPlanDate')]
    private ?DateTimeImmutable $newPlanDate = null;

    #[SerializedName('NewPlanDateState')]
    private ?string $newPlanDateState = null;

    #[SerializedName('OnDemandMigrationState')]
    private ?string $onDemandMigrationState = null;

    #[SerializedName('ExpectedDateForPlanDate')]
    private ?DateTimeImmutable $expectedDateForPlanDate = null;

    #[SerializedName('DeliveryStatus')]
    private ?string $deliveryStatus = null;

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

    // ─────────── Getters & Setters ───────────

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getFromOrderId(): ?int
    {
        return $this->fromOrderId;
    }

    public function setFromOrderId(?int $fromOrderId): self
    {
        $this->fromOrderId = $fromOrderId;
        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function setCustomerId(?int $customerId): self
    {
        $this->customerId = $customerId;
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

    public function getContactPerson(): ?string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(?string $contactPerson): self
    {
        $this->contactPerson = $contactPerson;
        return $this;
    }

    public function getContactPhoneNumber(): ?string
    {
        return $this->contactPhoneNumber;
    }

    public function setContactPhoneNumber(?string $contactPhoneNumber): self
    {
        $this->contactPhoneNumber = $contactPhoneNumber;
        return $this;
    }

    public function getHasBroadband(): ?bool
    {
        return $this->hasBroadband;
    }

    public function setHasBroadband(?bool $hasBroadband): self
    {
        $this->hasBroadband = $hasBroadband;
        return $this;
    }

    public function getHasPhone(): ?bool
    {
        return $this->hasPhone;
    }

    public function setHasPhone(?bool $hasPhone): self
    {
        $this->hasPhone = $hasPhone;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getKeepVoice(): ?bool
    {
        return $this->keepVoice;
    }

    public function setKeepVoice(?bool $keepVoice): self
    {
        $this->keepVoice = $keepVoice;
        return $this;
    }

    public function getServiceId(): ?string
    {
        return $this->serviceId;
    }

    public function setServiceId(?string $serviceId): self
    {
        $this->serviceId = $serviceId;
        return $this;
    }

    public function getIsraSpecs(): ?string
    {
        return $this->israSpecs;
    }

    public function setIsraSpecs(?string $israSpecs): self
    {
        $this->israSpecs = $israSpecs;
        return $this;
    }

    public function getLineType(): ?string
    {
        return $this->lineType;
    }

    public function setLineType(?string $lineType): self
    {
        $this->lineType = $lineType;
        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getContractStreet(): ?string
    {
        return $this->contractStreet;
    }

    public function setContractStreet(?string $contractStreet): self
    {
        $this->contractStreet = $contractStreet;
        return $this;
    }

    public function getContractHouseNumber(): ?int
    {
        return $this->contractHouseNumber;
    }

    public function setContractHouseNumber(?int $contractHouseNumber): self
    {
        $this->contractHouseNumber = $contractHouseNumber;
        return $this;
    }

    public function getContractHouseNumberExt(): ?string
    {
        return $this->contractHouseNumberExt;
    }

    public function setContractHouseNumberExt(?string $contractHouseNumberExt): self
    {
        $this->contractHouseNumberExt = $contractHouseNumberExt;
        return $this;
    }

    public function getContractZipCode(): ?string
    {
        return $this->contractZipCode;
    }

    public function setContractZipCode(?string $contractZipCode): self
    {
        $this->contractZipCode = $contractZipCode;
        return $this;
    }

    public function getContractCity(): ?string
    {
        return $this->contractCity;
    }

    public function setContractCity(?string $contractCity): self
    {
        $this->contractCity = $contractCity;
        return $this;
    }

    public function getPlanDate(): ?DateTimeImmutable
    {
        return $this->planDate;
    }

    public function setPlanDate(DateTimeInterface|string|null $planDate): self
    {
        $this->planDate = $this->normalizeDateTime($planDate);
        return $this;
    }

    public function getNlsLevel(): ?int
    {
        return $this->nlsLevel;
    }

    public function setNlsLevel(?int $nlsLevel): self
    {
        $this->nlsLevel = $nlsLevel;
        return $this;
    }

    public function getFtu(): ?string
    {
        return $this->ftu;
    }

    public function setFtu(?string $ftu): self
    {
        $this->ftu = $ftu;
        return $this;
    }

    /** @return DslChannelData[] */
    public function getChannels(): array
    {
        return $this->channels ?? [];
    }

    /**
     * @param DslChannelData[]|null $channels
     */
    public function setChannels(?array $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    public function getDistributionType(): ?string
    {
        return $this->distributionType;
    }

    public function setDistributionType(?string $distributionType): self
    {
        $this->distributionType = $distributionType;
        return $this;
    }

    public function getIsVectoring(): ?bool
    {
        return $this->isVectoring;
    }

    public function setIsVectoring(?bool $isVectoring): self
    {
        $this->isVectoring = $isVectoring;
        return $this;
    }

    public function getAppointmentId(): ?string
    {
        return $this->appointmentId;
    }

    public function setAppointmentId(?string $appointmentId): self
    {
        $this->appointmentId = $appointmentId;
        return $this;
    }

    public function getUseCustomTechnician(): ?bool
    {
        return $this->useCustomTechnician;
    }

    public function setUseCustomTechnician(?bool $useCustomTechnician): self
    {
        $this->useCustomTechnician = $useCustomTechnician;
        return $this;
    }

    public function getTestAndLabelActivity(): ?bool
    {
        return $this->testAndLabelActivity;
    }

    public function setTestAndLabelActivity(?bool $testAndLabelActivity): self
    {
        $this->testAndLabelActivity = $testAndLabelActivity;
        return $this;
    }

    public function getExistingDsl(): ?bool
    {
        return $this->existingDsl;
    }

    public function setExistingDsl(?bool $existingDsl): self
    {
        $this->existingDsl = $existingDsl;
        return $this;
    }

    public function getCurrentPhoneType(): ?string
    {
        return $this->currentPhoneType;
    }

    public function setCurrentPhoneType(?string $currentPhoneType): self
    {
        $this->currentPhoneType = $currentPhoneType;
        return $this;
    }

    public function getReferencePhonenumber(): ?string
    {
        return $this->referencePhonenumber;
    }

    public function setReferencePhonenumber(?string $referencePhonenumber): self
    {
        $this->referencePhonenumber = $referencePhonenumber;
        return $this;
    }

    public function getMaxNls(): ?int
    {
        return $this->maxNls;
    }

    public function setMaxNls(?int $maxNls): self
    {
        $this->maxNls = $maxNls;
        return $this;
    }

    public function getEapId(): ?string
    {
        return $this->eapId;
    }

    public function setEapId(?string $eapId): self
    {
        $this->eapId = $eapId;
        return $this;
    }

    public function getServiceGroup(): ?string
    {
        return $this->serviceGroup;
    }

    public function setServiceGroup(?string $serviceGroup): self
    {
        $this->serviceGroup = $serviceGroup;
        return $this;
    }

    public function getAccessId(): ?string
    {
        return $this->accessId;
    }

    public function setAccessId(?string $accessId): self
    {
        $this->accessId = $accessId;
        return $this;
    }

    public function getTrBlockId(): ?string
    {
        return $this->trBlockId;
    }

    public function setTrBlockId(?string $trBlockId): self
    {
        $this->trBlockId = $trBlockId;
        return $this;
    }

    public function getHoBlockId(): ?string
    {
        return $this->hoBlockId;
    }

    public function setHoBlockId(?string $hoBlockId): self
    {
        $this->hoBlockId = $hoBlockId;
        return $this;
    }

    public function getDonorTelco(): ?string
    {
        return $this->donorTelco;
    }

    public function setDonorTelco(?string $donorTelco): self
    {
        $this->donorTelco = $donorTelco;
        return $this;
    }

    public function getOutletRequired(): ?bool
    {
        return $this->outletRequired;
    }

    public function setOutletRequired(?bool $outletRequired): self
    {
        $this->outletRequired = $outletRequired;
        return $this;
    }

    public function getIsRelocation(): ?bool
    {
        return $this->isRelocation;
    }

    public function setIsRelocation(?bool $isRelocation): self
    {
        $this->isRelocation = $isRelocation;
        return $this;
    }

    public function getDikader(): ?int
    {
        return $this->dikader;
    }

    public function setDikader(?int $dikader): self
    {
        $this->dikader = $dikader;
        return $this;
    }

    public function getPoipAvailableOnFirstChannel(): ?bool
    {
        return $this->poipAvailableOnFirstChannel;
    }

    public function setPoipAvailableOnFirstChannel(?bool $poipAvailableOnFirstChannel): self
    {
        $this->poipAvailableOnFirstChannel = $poipAvailableOnFirstChannel;
        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    public function getContact2Name(): ?string
    {
        return $this->contact2Name;
    }

    public function setContact2Name(?string $contact2Name): self
    {
        $this->contact2Name = $contact2Name;
        return $this;
    }

    public function getContact2PhoneNumber(): ?string
    {
        return $this->contact2PhoneNumber;
    }

    public function setContact2PhoneNumber(?string $contact2PhoneNumber): self
    {
        $this->contact2PhoneNumber = $contact2PhoneNumber;
        return $this;
    }

    public function getContact2Email(): ?string
    {
        return $this->contact2Email;
    }

    public function setContact2Email(?string $contact2Email): self
    {
        $this->contact2Email = $contact2Email;
        return $this;
    }

    public function getOntSerialNumber(): ?string
    {
        return $this->ontSerialNumber;
    }

    public function setOntSerialNumber(?string $ontSerialNumber): self
    {
        $this->ontSerialNumber = $ontSerialNumber;
        return $this;
    }

    public function getNewPlanDate(): ?DateTimeImmutable
    {
        return $this->newPlanDate;
    }

    public function setNewPlanDate(DateTimeInterface|string|null $newPlanDate): self
    {
        $this->newPlanDate = $this->normalizeDateTime($newPlanDate);
        return $this;
    }

    public function getNewPlanDateState(): ?string
    {
        return $this->newPlanDateState;
    }

    public function setNewPlanDateState(?string $newPlanDateState): self
    {
        $this->newPlanDateState = $newPlanDateState;
        return $this;
    }

    public function getOnDemandMigrationState(): ?string
    {
        return $this->onDemandMigrationState;
    }

    public function setOnDemandMigrationState(?string $state): self
    {
        $this->onDemandMigrationState = $state;
        return $this;
    }

    public function getOnDemandMigrationStateEnum(): ?OnDemandMigrationState
    {
        return $this->onDemandMigrationState !== null
            ? OnDemandMigrationState::tryFrom($this->onDemandMigrationState)
            : null;
    }

    public function setOnDemandMigrationStateEnum(?OnDemandMigrationState $state): self
    {
        $this->onDemandMigrationState = $state?->value;
        return $this;
    }

    public function getExpectedDateForPlanDate(): ?DateTimeImmutable
    {
        return $this->expectedDateForPlanDate;
    }

    public function setExpectedDateForPlanDate(DateTimeInterface|string|null $expectedDateForPlanDate): self
    {
        $this->expectedDateForPlanDate = $this->normalizeDateTime($expectedDateForPlanDate);
        return $this;
    }

    public function getDeliveryStatus(): ?string
    {
        return $this->deliveryStatus;
    }

    public function setDeliveryStatus(?string $deliveryStatus): self
    {
        $this->deliveryStatus = $deliveryStatus;
        return $this;
    }
}