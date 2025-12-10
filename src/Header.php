<?php

namespace Inserve\RoutITAPI;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class Header
{
    #[SerializedName('PartnerReference')]
    protected ?string $partnerReference = null;

    #[SerializedName('DateCreated')]
    protected ?string $dateCreated = null;

    public function getPartnerReference(): ?string
    {
        return $this->partnerReference;
    }

    public function setPartnerReference(?string $partnerReference): self
    {
        $this->partnerReference = $partnerReference;

        return $this;
    }

    public function getDateCreated(): ?string
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTimeInterface|string|null $dateCreated
     */
    public function setDateCreated(\DateTimeInterface|string|null $dateCreated): self
    {
        if ($dateCreated instanceof \DateTimeInterface) {
            // Format as xs:dateTime, e.g. 2025-11-27T11:19:27
            $this->dateCreated = $dateCreated->format('Y-m-d\TH:i:s');
        } else {
            $this->dateCreated = $dateCreated;
        }

        return $this;
    }
}
