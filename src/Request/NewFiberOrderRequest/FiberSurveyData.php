<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

// use Inserve\RoutITAPI\Request\NewFiberOrderRequest\DaysAvailable;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

final class FiberSurveyData
{
    #[SerializedName('WhereDoesItEnterBuilding')]
    private string $whereDoesItEnterBuilding;

    #[SerializedName('IsFiberOnIsra')]
    private string $isFiberOnIsra;

    #[SerializedName('DoesItContinueToPatchPanel')]
    private string $doesItContinueToPatchPanel;

    #[SerializedName('SelfConnecting')]
    private string $selfConnecting;

    #[SerializedName('IsPatchInSameRoomAsDevice')]
    private string $isPatchInSameRoomAsDevice;

    #[SerializedName('DeviceLocation')]
    private string $deviceLocation;

    /**
     * This combination is the key:
     *
     * <DaysAvailable>
     *   <string>Monday</string>
     *   <string>Friday</string>
     * </DaysAvailable>
     */

    #[SerializedName('DaysAvailable')]
    #[SerializedPath('[DaysAvailable][string]')]
    private array $daysAvailable = [];

    #[SerializedName('MorningAfternoon')]
    private string $morningAfternoon;

    #[SerializedName('NewBuildLocation')]
    private string $newBuildLocation;

    #[SerializedName('IsITDataCenter')]
    private string $isITDataCenter;

    // ────────────────────────────── GETTERS ──────────────────────────────

    public function getWhereDoesItEnterBuilding(): ?string
    {
        return $this->whereDoesItEnterBuilding;
    }

    public function getIsFiberOnIsra(): ?string
    {
        return $this->isFiberOnIsra;
    }

    public function getDoesItContinueToPatchPanel(): ?string
    {
        return $this->doesItContinueToPatchPanel;
    }

    public function getSelfConnecting(): ?string
    {
        return $this->selfConnecting;
    }

    public function getIsPatchInSameRoomAsDevice(): ?string
    {
        return $this->isPatchInSameRoomAsDevice;
    }

    public function getDeviceLocation(): ?string
    {
        return $this->deviceLocation;
    }

    /**
     * @return string[]
     */
    public function getDaysAvailable(): array
    {
        return $this->daysAvailable;
    }

    public function getMorningAfternoon(): ?string
    {
        return $this->morningAfternoon;
    }

    public function getNewBuildLocation(): ?string
    {
        return $this->newBuildLocation;
    }

    public function getIsITDataCenter(): ?string
    {
        return $this->isITDataCenter;
    }

    // Setters
    public function setWhereDoesItEnterBuilding(string $v): self { $this->whereDoesItEnterBuilding = $v; return $this; }
    public function setIsFiberOnIsra(string $v): self { $this->isFiberOnIsra = $v; return $this; }
    public function setDoesItContinueToPatchPanel(string $v): self { $this->doesItContinueToPatchPanel = $v; return $this; }
    public function setSelfConnecting(string $v): self { $this->selfConnecting = $v; return $this; }
    public function setIsPatchInSameRoomAsDevice(string $v): self { $this->isPatchInSameRoomAsDevice = $v; return $this; }
    public function setDeviceLocation(string $v): self { $this->deviceLocation = $v; return $this; }
    /**
     * @param string[] $days
     */
    public function setDaysAvailable(array $days): self
    {
        $this->daysAvailable = array_values(
            array_filter(
                array_map('trim', $days),
                static fn ($v) => $v !== ''
            )
        );

        return $this;
    }
    public function setMorningAfternoon(string $v): self { $this->morningAfternoon = $v; return $this; }
    public function setNewBuildLocation(string $v): self { $this->newBuildLocation = $v; return $this; }
    public function setIsITDataCenter(string $v): self { $this->isITDataCenter = $v; return $this; }
}
