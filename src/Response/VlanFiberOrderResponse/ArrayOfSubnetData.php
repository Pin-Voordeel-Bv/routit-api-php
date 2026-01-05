<?php

namespace Inserve\RoutITAPI\Response\VlanFiberOrderResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class ArrayOfSubnetData
{
    /**
     * @var SubnetData[]
     */
    #[SerializedName('SubnetData_V2')]
    private array $items = [];

    /**
     * @return SubnetData[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param SubnetData[] $items
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function add(SubnetData $item): self
    {
        $this->items[] = $item;
        return $this;
    }
}