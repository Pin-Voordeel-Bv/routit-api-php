<?php

namespace Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest;

use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewVlanFiberRequestData
{
    #[SerializedName('Subnets')]
    private ArrayOfSubnetRequestData $subnets;

    #[SerializedName('IPVpnOrderId')]
    private ?int $ipVpnOrderId = null;

    #[SerializedName('IPAddressPE')]
    private ?string $ipAddressPe = null;

    // REQUIRED (minOccurs=1) → make sure it’s never null unless you REALLY want xsi:nil
    #[SerializedName('IsClosed')]
    private bool $isClosed = false;

    #[SerializedName('IsSubnetOverlapCheckDisabled')]
    private ?bool $isSubnetOverlapCheckDisabled = null;

    public function validate(): array
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['subnets', 'isClosed'], $errors);

        Validator::assertWrappedArrayPresentAndValid($this->subnets, 'subnets', $errors);

        Validator::assertOptionalInt($this, 'ipVpnOrderId', $errors);
        Validator::assertOptionalStringLength($this->ipAddressPe, null, 255, 'IPAddressPE', $errors);
        Validator::validateOptionalNested($this->portInformation ?? null, 'portInformation', $errors);
        Validator::validateOptionalNested($this->networkInformation ?? null, 'networkInformation', $errors);
        Validator::assertOptionalBoolean($this, 'isSubnetOverlapCheckDisabled', $errors);
        Validator::assertInitializedBoolean($this, 'isClosed', $errors);

        return $errors;
    }

    public function __construct()
    {
        $this->subnets = new ArrayOfSubnetRequestData();
    }

    public function getSubnets(): ArrayOfSubnetRequestData
    {
        return $this->subnets;
    }

    public function setSubnets(ArrayOfSubnetRequestData $subnets): self
    {
        $this->subnets = $subnets;
        return $this;
    }

    public function getIpVpnOrderId(): ?int
    {
        return $this->ipVpnOrderId;
    }

    public function setIpVpnOrderId(?int $ipVpnOrderId): self
    {
        $this->ipVpnOrderId = $ipVpnOrderId;
        return $this;
    }

    public function getIpAddressPe(): ?string
    {
        return $this->ipAddressPe;
    }

    public function setIpAddressPe(?string $ipAddressPe): self
    {
        $this->ipAddressPe = $ipAddressPe;
        return $this;
    }

    public function getIsClosed(): bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(?bool $isClosed): self
    {
        // if you pass null, we keep it safe (required field)
        $this->isClosed = (bool) $isClosed;
        return $this;
    }

    public function getIsSubnetOverlapCheckDisabled(): ?bool
    {
        return $this->isSubnetOverlapCheckDisabled;
    }

    public function setIsSubnetOverlapCheckDisabled(?bool $disabled): self
    {
        $this->isSubnetOverlapCheckDisabled = $disabled;
        return $this;
    }
}