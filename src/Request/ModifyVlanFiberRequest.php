<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\ModifyVlanFiberRequest\ModifyVlanFiberRequestData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyVlanFiberRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'ModifyVlanFiberRequest_V2';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private int $orderId;

    #[SerializedName('ModifyVlanFiberRequestData')]
    private ?ModifyVlanFiberRequestData $modifyVlanFiberRequestData = null;

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

    public function getModifyVlanFiberRequestData(): ?ModifyVlanFiberRequestData
    {
        return $this->modifyVlanFiberRequestData;
    }

    public function setModifyVlanFiberRequestData(?ModifyVlanFiberRequestData $data): self
    {
        $this->modifyVlanFiberRequestData = $data;
        return $this;
    }
}