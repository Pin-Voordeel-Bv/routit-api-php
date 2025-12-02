<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use Inserve\RoutITAPI\Request\NewFiberOrderRequest\SubnetRequestData;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

final class NewVlanFiberRequestData
{
    /**
     * @var SubnetRequestData[]
     *
     * Generates:
     * <Subnets>
     *   <SubnetRequestData_V1>...</SubnetRequestData_V1>
     *   <SubnetRequestData_V1>...</SubnetRequestData_V1>
     * </Subnets>
     */
    #[SerializedName('Subnets')]
    #[SerializedPath('[Subnets][SubnetRequestData_V1]')]
    private array $subnets = [];

    #[SerializedName('IPVpnOrderId')]
    private ?int $ipVpnOrderId = null;

    #[SerializedName('IsSubnetOverlapCheckDisabled')]
    private ?bool $isSubnetOverlapCheckDisabled = null;

    #[SerializedName('PerformIPMigration')]
    private ?bool $performIPMigration = null;

    /**
     * @return SubnetRequestData[]
     */
    public function getSubnets(): array
    {
        return $this->subnets;
    }

    /**
     * @param SubnetRequestData[] $subnets
     */
    public function setSubnets(array $subnets): self
    {
        $this->subnets = $subnets;
        return $this;
    }

    public function addSubnet(SubnetRequestData $subnet): self
    {
        $this->subnets[] = $subnet;
        return $this;
    }

    public function getIPVpnOrderId(): ?int
    {
        return $this->ipVpnOrderId;
    }

    public function setIPVpnOrderId(?int $ipVpnOrderId): self
    {
        $this->ipVpnOrderId = $ipVpnOrderId;
        return $this;
    }

    public function getIsSubnetOverlapCheckDisabled(): ?bool
    {
        return $this->isSubnetOverlapCheckDisabled;
    }

    public function setIsSubnetOverlapCheckDisabled(?bool $isSubnetOverlapCheckDisabled): self
    {
        $this->isSubnetOverlapCheckDisabled = $isSubnetOverlapCheckDisabled;
        return $this;
    }

    public function getPerformIPMigration(): ?bool
    {
        return $this->performIPMigration;
    }

    public function setPerformIPMigration(?bool $performIPMigration): self
    {
        $this->performIPMigration = $performIPMigration;
        return $this;
    }
}