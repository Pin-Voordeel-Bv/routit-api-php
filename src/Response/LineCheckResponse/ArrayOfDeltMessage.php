<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class ArrayOfDeltMessage
{
    /**
     * XML:
     * <DeltDetails>
     *   <DeltMessage_V1>...</DeltMessage_V1>
     *   <DeltMessage_V1>...</DeltMessage_V1>
     * </DeltDetails>
     *
     * @var DeltMessage[]|null
     */
    #[SerializedName('DeltMessage_V1')]
    private ?array $items = null;

    /**
     * @return DeltMessage[]
     */
    public function getMessages(): array
    {
        return $this->items ?? [];
    }

    /**
     * @param DeltMessage[]|null $items
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}