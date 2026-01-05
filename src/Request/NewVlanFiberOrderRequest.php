<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\NewVlanFiberOrderRequest\NewVlanFiberRequestData;
use Symfony\Component\Serializer\Attribute\Ignore;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewVlanFiberOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'NewVlanFiberOrderRequest_V2';

    #[SerializedName('Header')]
    private Header $header;

    #[SerializedName('CustomerId')]
    private int $customerId;

    #[SerializedName('FiberOrderId')]
    private int $fiberOrderId;

    #[SerializedName('VlanFiberProductId')]
    private string $vlanFiberProductId;

    #[SerializedName('NewVlanFiberRequestData')]
    private NewVlanFiberRequestData $newVlanFiberRequestData;

    // ---- getters/setters ----

    public function getHeader(): Header
    {
        return $this->header;
    }

    public function setHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getFiberOrderId(): int
    {
        return $this->fiberOrderId;
    }

    public function setFiberOrderId(int $fiberOrderId): self
    {
        $this->fiberOrderId = $fiberOrderId;
        return $this;
    }

    public function getVlanFiberProductId(): string
    {
        return $this->vlanFiberProductId;
    }

    public function setVlanFiberProductId(string $vlanFiberProductId): self
    {
        $this->vlanFiberProductId = $vlanFiberProductId;
        return $this;
    }

    public function getNewVlanFiberRequestData(): NewVlanFiberRequestData
    {
        return $this->newVlanFiberRequestData;
    }

    public function setNewVlanFiberRequestData(NewVlanFiberRequestData $data): self
    {
        $this->newVlanFiberRequestData = $data;
        return $this;
    }
}