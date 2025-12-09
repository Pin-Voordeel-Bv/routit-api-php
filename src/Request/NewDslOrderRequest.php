<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Request\Header;
use Inserve\RoutITAPI\Request\NewDslOrderRequest\DslChannel;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

final class NewDslOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'NewDslOrderRequest_V4';

    #[SerializedName('Header')]
    private ?Header $header = null;

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

    #[SerializedName('MaxNLS')]
    private ?int $maxNls = null;

    #[SerializedName('PhoneNumber')]
    private ?string $phoneNumber = null;

    #[SerializedName('KeepVoice')]
    private ?bool $keepVoice = null;

    #[SerializedName('ServiceID')]
    private ?string $serviceId = null;

    #[SerializedName('IsComplexAddress')]
    private ?bool $isComplexAddress = null;

    // 🛑 Safety net: if Symfony discovers a "complexAddress" property, don’t serialize it
    #[Ignore]
    private ?bool $complexAddress = null;

    #[SerializedName('IsraSpecs')]
    private ?string $israSpecs = null;

    #[SerializedName('OutletRequired')]
    private ?bool $outletRequired = null;

    // LineType is "vervallen" (obsolete) but still in schema as optional
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

    // WishDate xs:dateTime (optional) – store as string "YYYY-MM-DDTHH:MM:SS"
    #[SerializedName('WishDate')]
    private ?string $wishDate = null;

    // Channels: ArrayOfDslChannel_V2 -> DslChannel_V2[]
    /** @var DslChannel[]|null */
    #[SerializedPath('[Channels][DslChannel_V2]')]
    private ?array $channels = null;

    #[SerializedName('ModemType')]
    private ?string $modemType = null;

    #[SerializedName('ModemMacAddress')]
    private ?string $modemMacAddress = null;

    #[SerializedName('ModemSerialNumber')]
    private ?string $modemSerialNumber = null;

    #[SerializedName('UseCustomTechnician')]
    private ?bool $useCustomTechnician = null;

    #[SerializedName('AppointmentId')]
    private ?string $appointmentId = null;

    #[SerializedName('TestAndLabelActivity')]
    private ?bool $testAndLabelActivity = null;

    #[SerializedName('CrossWiresActivity')]
    private ?bool $crossWiresActivity = null;

    #[SerializedName('InstallerId')]
    private ?string $installerId = null;

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

    #[SerializedName('ServiceGroup')]
    private ?string $serviceGroup = null;

    #[SerializedName('NoLineTestAndLabel')]
    private ?bool $noLineTestAndLabel = null;

    #[SerializedName('IsNTDeliveryServiceRequired')]
    private ?bool $isNtDeliveryServiceRequired = null;

    #[SerializedName('IsOnDemandMigration')]
    private ?bool $isOnDemandMigration = null;

    #[SerializedName('IsCuFOrder')]
    private ?bool $isCuFOrder = null;

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

    // ───────── CustomerId ─────────

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function setCustomerId(?int $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    // ───────── CompanyName ─────────

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    // ───────── ContactPerson ─────────

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

    public function getMaxNls(): ?int
    {
        return $this->maxNls;
    }

    public function setMaxNls(?int $maxNls): self
    {
        $this->maxNls = $maxNls;
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

    public function isComplexAddress(): ?bool
    {
        return $this->isComplexAddress;
    }

    public function setIsComplexAddress(?bool $isComplexAddress): self
    {
        $this->isComplexAddress = $isComplexAddress;
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

    public function getOutletRequired(): ?bool
    {
        return $this->outletRequired;
    }

    public function setOutletRequired(?bool $outletRequired): self
    {
        $this->outletRequired = $outletRequired;
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

    public function getWishDate(): ?string
    {
        return $this->wishDate;
    }

    /**
     * @param \DateTimeInterface|string|null $wishDate
     */
    public function setWishDate(\DateTimeInterface|string|null $wishDate): self
    {
        if ($wishDate instanceof \DateTimeInterface) {
            // Full xs:dateTime
            $this->wishDate = $wishDate->format('Y-m-d\TH:i:s');
        } else {
            $this->wishDate = $wishDate;
        }

        return $this;
    }

    // ───────── Channels ─────────

    /**
     * @return DslChannel[]|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }

    /**
     * @param DslChannel[]|null $channels
     */
    public function setChannels(?array $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    // ───────── Modem & technician fields ─────────

    public function getModemType(): ?string
    {
        return $this->modemType;
    }

    public function setModemType(?string $modemType): self
    {
        $this->modemType = $modemType;
        return $this;
    }

    public function getModemMacAddress(): ?string
    {
        return $this->modemMacAddress;
    }

    public function setModemMacAddress(?string $modemMacAddress): self
    {
        $this->modemMacAddress = $modemMacAddress;
        return $this;
    }

    public function getModemSerialNumber(): ?string
    {
        return $this->modemSerialNumber;
    }

    public function setModemSerialNumber(?string $modemSerialNumber): self
    {
        $this->modemSerialNumber = $modemSerialNumber;
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

    public function getAppointmentId(): ?string
    {
        return $this->appointmentId;
    }

    public function setAppointmentId(?string $appointmentId): self
    {
        $this->appointmentId = $appointmentId;
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

    public function getCrossWiresActivity(): ?bool
    {
        return $this->crossWiresActivity;
    }

    public function setCrossWiresActivity(?bool $crossWiresActivity): self
    {
        $this->crossWiresActivity = $crossWiresActivity;
        return $this;
    }

    public function getInstallerId(): ?string
    {
        return $this->installerId;
    }

    public function setInstallerId(?string $installerId): self
    {
        $this->installerId = $installerId;
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

    public function getServiceGroup(): ?string
    {
        return $this->serviceGroup;
    }

    public function setServiceGroup(?string $serviceGroup): self
    {
        $this->serviceGroup = $serviceGroup;
        return $this;
    }

    public function getNoLineTestAndLabel(): ?bool
    {
        return $this->noLineTestAndLabel;
    }

    public function setNoLineTestAndLabel(?bool $noLineTestAndLabel): self
    {
        $this->noLineTestAndLabel = $noLineTestAndLabel;
        return $this;
    }

    public function getIsNtDeliveryServiceRequired(): ?bool
    {
        return $this->isNtDeliveryServiceRequired;
    }

    public function setIsNtDeliveryServiceRequired(?bool $isNtDeliveryServiceRequired): self
    {
        $this->isNtDeliveryServiceRequired = $isNtDeliveryServiceRequired;
        return $this;
    }

    public function getIsOnDemandMigration(): ?bool
    {
        return $this->isOnDemandMigration;
    }

    public function setIsOnDemandMigration(?bool $isOnDemandMigration): self
    {
        $this->isOnDemandMigration = $isOnDemandMigration;
        return $this;
    }

    public function getIsCuFOrder(): ?bool
    {
        return $this->isCuFOrder;
    }

    public function setIsCuFOrder(?bool $isCuFOrder): self
    {
        $this->isCuFOrder = $isCuFOrder;
        return $this;
    }
}