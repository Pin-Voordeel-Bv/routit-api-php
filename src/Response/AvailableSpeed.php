<?php

namespace Inserve\RoutITAPI\Response;

use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 *
 */
final class AvailableSpeed
{
    #[SerializedName('Availability')]
    protected ?string $availability = null;

    #[SerializedName('Description')]
    protected ?string $description = null;

    #[SerializedName('NlsType')]
    protected $nlsType = null;

    #[SerializedName('Remarks')]
    protected $remarks = null; // note: NO type, just mixed

    #[SerializedName('Technology')]
    protected ?string $technology = null;

    #[SerializedName('TariffCluster')]
    protected ?string $tariffCluster = null;

    #[SerializedName('PlanDate')]
    protected ?DateTimeInterface $planDate = null;

    /**
     * @return string|null
     */
    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    /**
     * @param string|null $availability
     *
     * @return $this
     */
    public function setAvailability(?string $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNlsType(): ?string
    {
        // if we already normalized to string/null, just return it
        if ($this->nlsType === null || $this->nlsType === '') {
            return null;
        }

        if (is_string($this->nlsType)) {
            return $this->nlsType;
        }

        // if somehow it's still an array or something weird → treat as null
        return null;
    }

    /**
     * @param mixed $nlsType
     *
     * @return $this
     */
    public function setNlsType(mixed $nlsType): self
    {
        // Case: <NlsType p6:nil="true" ... />
        if (is_array($nlsType)) {
            $flat = array_change_key_case($nlsType, CASE_LOWER);
            $nil  = $flat['@xsi:nil'] ?? $flat['@nil'] ?? $flat['nil'] ?? null;

            if ($nil === 'true' || $nil === true || $nil === '1') {
                $this->nlsType = null;
                return $this;
            }

            // Unknown array shape → safest is null
            $this->nlsType = null;
            return $this;
        }

        // Normal string like "Nls1", "Nls6", ...
        if (is_string($nlsType)) {
            $this->nlsType = $nlsType;
            return $this;
        }

        // null or anything else
        $this->nlsType = null;
        return $this;
    }

    /**
     * Always return a flat list of non-empty strings.
     *
     * @return string[]
     */
    public function getRemarks(): array
    {
        $raw = $this->remarks;

        if ($raw === null || $raw === '') {
            return [];
        }

        // Single scalar → one remark (if non-empty)
        if (is_scalar($raw) || $raw instanceof \Stringable) {
            $s = trim((string) $raw);
            return $s === '' ? [] : [$s];
        }

        // Traversable → turn into array
        if ($raw instanceof \Traversable) {
            $raw = iterator_to_array($raw);
        }

        // Any array shape → flatten all scalar values
        if (is_array($raw)) {
            $out = [];

            $it = new \RecursiveIteratorIterator(
                new \RecursiveArrayIterator($raw)
            );

            foreach ($it as $v) {
                if (is_scalar($v) || $v instanceof \Stringable) {
                    $s = trim((string) $v);
                    if ($s !== '') {
                        $out[] = $s;
                    }
                }
            }

            return $out;
        }

        // Anything else → no remarks
        return [];
    }

    /**
     * @param mixed $remarks
     */
    public function setRemarks(mixed $remarks): self
    {
        // Possible shapes:
        // - null
        // - ''
        // - 'some text'
        // - ['string' => ['Nls6', 'Bestel de ...']]
        // - ['string' => 'Nls6']
        // - []
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTechnology(): ?string
    {
        return $this->technology;
    }

    /**
     * @param string|null $technology
     *
     * @return $this
     */
    public function setTechnology(?string $technology): self
    {
        $this->technology = $technology;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTariffCluster(): ?string
    {
        return $this->tariffCluster;
    }

    /**
     * @param string|null $tariffCluster
     *
     * @return $this
     */
    public function setTariffCluster(?string $tariffCluster): self
    {
        $this->tariffCluster = $tariffCluster;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getPlanDate(): ?DateTimeInterface
    {
        return $this->planDate;
    }

    /**
     * @param mixed $planDate
     *
     * @return $this
     */
    public function setPlanDate(mixed $planDate): self
    {
        // Case 1: explicit null or empty string
        if ($planDate === null || $planDate === '') {
            $this->planDate = null;
            return $this;
        }

        // Case 2: XML decoder gave an array for xsi:nil / attributes
        if (is_array($planDate)) {
            $flat = array_change_key_case($planDate, CASE_LOWER);

            // Try to detect any kind of nil="true"
            $nil =
                $flat['@xsi:nil'] ??
                $flat['@nil'] ??
                $flat['nil'] ??
                null;

            if ($nil === 'true' || $nil === true || $nil === '1') {
                $this->planDate = null;
                return $this;
            }

            // Unknown array shape → be safe and treat as null
            $this->planDate = null;
            return $this;
        }

        // Case 3: normal date string "2024-02-15T13:45:00"
        if (is_string($planDate)) {
            try {
                $this->planDate = new DateTimeImmutable($planDate);
            } catch (\Throwable $e) {
                // Invalid date format → store null, don't kill deserialization
                $this->planDate = null;
            }

            return $this;
        }

        // Case 4: Already a DateTimeInterface (unlikely, but fine)
        if ($planDate instanceof DateTimeInterface) {
            $this->planDate = $planDate;
            return $this;
        }

        // Fallback: unknown type → null
        $this->planDate = null;
        return $this;
    }
}
