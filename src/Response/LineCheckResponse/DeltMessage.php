<?php

namespace Inserve\RoutITAPI\Response\LineCheckResponse;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeltMessage
{
    #[SerializedName('DslamPort')]
    private ?string $dslamPort = null;

    #[SerializedName('Details')]
    private ?DeltMain $details = null;

    public function getDslamPort(): ?string
    {
        return $this->dslamPort;
    }

    public function setDslamPort(?string $dslamPort): self
    {
        $this->dslamPort = $dslamPort;
        return $this;
    }

    public function getDetails(): ?DeltMain
    {
        return $this->details;
    }

    public function setDetails(?DeltMain $details): self
    {
        $this->details = $details;
        return $this;
    }
}