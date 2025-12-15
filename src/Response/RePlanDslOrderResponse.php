<?php
declare(strict_types=1);

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\RePlanDslOrderResponse\ModifiedStatus;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class RePlanDslOrderResponse
{
    protected string $rootNode = 'RePlanDslOrderResponse_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('Status')]
    private ?ModifiedStatus $status = null;

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

    public function getStatus(): ?ModifiedStatus
    {
        return $this->status;
    }

    public function setStatus(?ModifiedStatus $status): self
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