<?php
declare(strict_types=1);

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyDeclined
{
    /**
     * If your code uses rootNode to serialize the top element name,
     * keep this consistent with the XSD: ModifyDeclined_V1
     */
    protected string $rootNode = 'ModifyDeclined_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('Status')]
    private ?DeclinedStatus $status = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    public function getRootNode(): string
    {
        return $this->rootNode;
    }

    public function setRootNode(string $rootNode): self
    {
        $this->rootNode = $rootNode;
        return $this;
    }

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getStatus(): ?DeclinedStatus
    {
        return $this->status;
    }

    public function setStatus(?DeclinedStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }
}
