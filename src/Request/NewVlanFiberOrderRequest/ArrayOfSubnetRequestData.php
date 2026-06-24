<?php

namespace Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest;

use Inserve\RoutITAPI\Request\SubnetRequestData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ArrayOfSubnetRequestData
{
    /**
     * @var SubnetRequestData[]|null
     */
    #[SerializedName('SubnetRequestData_V1')]
    private ?array $items = null;

    /** @return SubnetRequestData[] */
    public function getItems(): array
    {
        return $this->items ?? [];
    }

    /** @param SubnetRequestData[]|null $items */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function add(SubnetRequestData $item): self
    {
        $this->items ??= [];
        $this->items[] = $item;
        return $this;
    }
}
