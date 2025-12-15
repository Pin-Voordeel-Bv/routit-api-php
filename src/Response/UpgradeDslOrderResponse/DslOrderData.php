<?php

namespace Inserve\RoutITAPI\Response\UpgradeDslOrderResponse;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * DslOrderData_V1 (used in UpgradeDslOrderResponse_V1)
 */
final class DslOrderData
{
    #[SerializedName('OrderId')]
    private ?string $orderId = null;

    #[SerializedName('FromOrderId')]
    private ?string $fromOrderId = null;

    #[SerializedName('CustomerId')]
    private ?string $customerId = null;

    #[SerializedName('CompanyName')]
    private ?string $companyName = null;

    #[SerializedName('ContactPerson')]
    private ?string $contactPerson = null;

    #[SerializedName('ContactPhoneNumber')]
    private ?string $contactPhoneNumber = null;

    #[SerializedName('HasBroadband')]
    private ?bool $hasBroadband = null; // required in XSD, but keep nullable for robustness

    #[SerializedName('HasPhone')]
    private ?bool $hasPhone = null; // required in XSD, but keep nullable for robustness

    #[SerializedName('PhoneNumber')]
    private ?string $phoneNumber = null;

    #[SerializedName('KeepVoice')]
    private ?bool $keepVoice = null; // required in XSD, but keep nullable for robustness

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
    private ?DateTimeImmutable $planDate = null; // required in XSD

    #[SerializedName('NLSLevel')]
    private ?int $nlsLevel = null; // required in XSD

    #[SerializedName('FTU')]
    private ?string $ftu = null;

    /**
     * In XML this is:
     * <Channels>
     *   <DslChannelData>...</DslChannelData>
     *   <DslChannelData>...</DslChannelData>
     * </Channels>
     *
     * Symfony XML encoder often gives either:
     * - ['DslChannelData' => [ ...list... ]]
     * - ['DslChannelData' => ...single...]
     *
     * So we keep it as mixed/array and provide a normalizer accessor.
     *
     * @var array<string,mixed>|DslChannelData[]|null
     */
    #[SerializedName('Channels')]
    private array|null $channels = null;

    #[SerializedName('DistributionType')]
    private ?string $distributionType = null;

    #[SerializedName('IsVectoring')]
    private ?bool $isVectoring = null; // required in XSD

    // ─────────── helpers ───────────

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

    public function getOrderId(): ?string { return $this->orderId; }
    public function setOrderId(?string $orderId): self { $this->orderId = $orderId; return $this; }

    public function getFromOrderId(): ?string { return $this->fromOrderId; }
    public function setFromOrderId(?string $fromOrderId): self { $this->fromOrderId = $fromOrderId; return $this; }

    public function getCustomerId(): ?string { return $this->customerId; }
    public function setCustomerId(?string $customerId): self { $this->customerId = $customerId; return $this; }

    public function getCompanyName(): ?string { return $this->companyName; }
    public function setCompanyName(?string $companyName): self { $this->companyName = $companyName; return $this; }

    public function getContactPerson(): ?string { return $this->contactPerson; }
    public function setContactPerson(?string $contactPerson): self { $this->contactPerson = $contactPerson; return $this; }

    public function getContactPhoneNumber(): ?string { return $this->contactPhoneNumber; }
    public function setContactPhoneNumber(?string $contactPhoneNumber): self { $this->contactPhoneNumber = $contactPhoneNumber; return $this; }

    public function getHasBroadband(): ?bool { return $this->hasBroadband; }
    public function setHasBroadband(?bool $hasBroadband): self { $this->hasBroadband = $hasBroadband; return $this; }

    public function getHasPhone(): ?bool { return $this->hasPhone; }
    public function setHasPhone(?bool $hasPhone): self { $this->hasPhone = $hasPhone; return $this; }

    public function getPhoneNumber(): ?string { return $this->phoneNumber; }
    public function setPhoneNumber(?string $phoneNumber): self { $this->phoneNumber = $phoneNumber; return $this; }

    public function getKeepVoice(): ?bool { return $this->keepVoice; }
    public function setKeepVoice(?bool $keepVoice): self { $this->keepVoice = $keepVoice; return $this; }

    public function getServiceId(): ?string { return $this->serviceId; }
    public function setServiceId(?string $serviceId): self { $this->serviceId = $serviceId; return $this; }

    public function getIsraSpecs(): ?string { return $this->israSpecs; }
    public function setIsraSpecs(?string $israSpecs): self { $this->israSpecs = $israSpecs; return $this; }

    public function getLineType(): ?string { return $this->lineType; }
    public function setLineType(?string $lineType): self { $this->lineType = $lineType; return $this; }

    public function getLabel(): ?string { return $this->label; }
    public function setLabel(?string $label): self { $this->label = $label; return $this; }

    public function getContractStreet(): ?string { return $this->contractStreet; }
    public function setContractStreet(?string $contractStreet): self { $this->contractStreet = $contractStreet; return $this; }

    public function getContractHouseNumber(): ?int { return $this->contractHouseNumber; }
    public function setContractHouseNumber(?int $contractHouseNumber): self { $this->contractHouseNumber = $contractHouseNumber; return $this; }

    public function getContractHouseNumberExt(): ?string { return $this->contractHouseNumberExt; }
    public function setContractHouseNumberExt(?string $contractHouseNumberExt): self { $this->contractHouseNumberExt = $contractHouseNumberExt; return $this; }

    public function getContractZipCode(): ?string { return $this->contractZipCode; }
    public function setContractZipCode(?string $contractZipCode): self { $this->contractZipCode = $contractZipCode; return $this; }

    public function getContractCity(): ?string { return $this->contractCity; }
    public function setContractCity(?string $contractCity): self { $this->contractCity = $contractCity; return $this; }

    public function getPlanDate(): ?DateTimeImmutable { return $this->planDate; }
    public function setPlanDate(DateTimeInterface|string|null $planDate): self { $this->planDate = $this->normalizeDateTime($planDate); return $this; }

    public function getNlsLevel(): ?int { return $this->nlsLevel; }
    public function setNlsLevel(?int $nlsLevel): self { $this->nlsLevel = $nlsLevel; return $this; }

    public function getFtu(): ?string { return $this->ftu; }
    public function setFtu(?string $ftu): self { $this->ftu = $ftu; return $this; }

    public function getDistributionType(): ?string { return $this->distributionType; }
    public function setDistributionType(?string $distributionType): self { $this->distributionType = $distributionType; return $this; }

    public function getIsVectoring(): ?bool { return $this->isVectoring; }
    public function setIsVectoring(?bool $isVectoring): self { $this->isVectoring = $isVectoring; return $this; }

    /**
     * Raw channels (whatever serializer gave us)
     * @return array<string,mixed>|DslChannelData[]|null
     */
    public function getChannelsRaw(): array|null
    {
        return $this->channels;
    }

    /**
     * @param array<string,mixed>|DslChannelData[]|null $channels
     */
    public function setChannels(array|null $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    /**
     * Normalized channels list
     *
     * @return DslChannelData[]
     */
    public function getChannels(): array
    {
        if ($this->channels === null) {
            return [];
        }

        // If already a list of objects
        if (isset($this->channels[0]) && $this->channels[0] instanceof DslChannelData) {
            return $this->channels;
        }

        // Typical XML case: ['DslChannelData' => [ ... ]]
        if (isset($this->channels['DslChannelData'])) {
            $v = $this->channels['DslChannelData'];

            if ($v instanceof DslChannelData) {
                return [$v];
            }

            if (is_array($v)) {
                // might be list of objects or list of arrays
                return array_values(array_filter($v, fn ($x) => $x instanceof DslChannelData));
            }
        }

        // Fallback: filter any objects
        return array_values(array_filter($this->channels, fn ($x) => $x instanceof DslChannelData));
    }
}
