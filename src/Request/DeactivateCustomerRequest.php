<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Request\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeactivateCustomerRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'DeactivateCustomerRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('CustomerId')]
    private ?string $customerId = null;

    #[SerializedName('SetActive')]
    private ?bool $setActive = null;

    // ───────────────── Header ─────────────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    // ───────────────── CustomerId ─────────────────

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    // ───────────────── SetActive ─────────────────

    public function getSetActive(): ?bool
    {
        return $this->setActive;
    }

    public function setSetActive(?bool $setActive): self
    {
        $this->setActive = $setActive;
        return $this;
    }
}
