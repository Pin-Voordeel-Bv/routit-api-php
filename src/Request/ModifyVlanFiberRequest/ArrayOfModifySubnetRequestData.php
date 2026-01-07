<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class ArrayOfModifySubnetRequestData
{
    /** @var ModifySubnetRequestData[] */
    #[SerializedName('ModifySubnetRequestData_V1')]
    private array $items = [];

    /** @return ModifySubnetRequestData[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param ModifySubnetRequestData[] $items */
    public function setItems(array $items): self
    {
        $this->items = array_values($items);
        return $this;
    }

    public function add(ModifySubnetRequestData $item): self
    {
        $this->items[] = $item;
        return $this;
    }
}