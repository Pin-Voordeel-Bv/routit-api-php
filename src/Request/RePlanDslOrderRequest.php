<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class RePlanDslOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'RePlanDslOrderRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private int $orderId;

    #[SerializedName('NewPlanDate')]
    private string $newPlanDate;

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getNewPlanDate(): string
    {
        return $this->newPlanDate;
    }

    public function setNewPlanDate(\DateTimeInterface $dt): self
    {
        $this->newPlanDate = $dt->format('Y-m-d\TH:i:sP'); // or without P
        return $this;
    }
}
