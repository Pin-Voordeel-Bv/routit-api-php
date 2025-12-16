<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltResponse
{
    #[SerializedName('DeltDetails')]
    private ?ArrayOfDeltMessage $deltDetails = null;

    public function getDeltDetails(): ?ArrayOfDeltMessage
    {
        return $this->deltDetails;
    }

    public function setDeltDetails(?ArrayOfDeltMessage $deltDetails): self
    {
        $this->deltDetails = $deltDetails;
        return $this;
    }

    /**
     * Convenience: flattened list.
     *
     * @return DeltMessage[]
     */
    public function getMessages(): array
    {
        return $this->deltDetails?->getMessages() ?? [];
    }
}