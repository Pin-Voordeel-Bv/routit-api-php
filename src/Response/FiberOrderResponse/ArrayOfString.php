<?php

namespace Inserve\RoutITAPI\Response\FiberOrderResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class ArrayOfString
{
    /** @var string[]|null */
    #[SerializedName('string')]
    private ?array $strings = null;

    /** @return string[] */
    public function getStrings(): array
    {
        return $this->strings ?? [];
    }

    /** @param string[]|null $strings */
    public function setStrings(?array $strings): self
    {
        $this->strings = $strings;
        return $this;
    }
}
