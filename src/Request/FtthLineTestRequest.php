<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class FtthLineTestRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    /**
     * Root XML element name
     */
    protected string $rootNode = 'FtthLineTestRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private int $orderId;

    // ───────── Header ─────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    // ───────── OrderId ─────────

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }
}