<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Request\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyDslOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'ModifyDslOrderRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('OntSerialNumber')]
    private ?string $ontSerialNumber = null;

    /**
     * getHeader
     * @return Header|null
     */
    public function getHeader(): ?Header
    {
        return $this->header;
    }

    /**
     * setHeader
     * @param mixed $header
     * @return ModifyFiberOrderRequest
     */
    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * getCustomerId
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * setCustomerId
     * @param mixed $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOntSerialNumber(): ?string
    {
        return $this->ontSerialNumber;
    }

    /**
     * @param string|null $ontSerialNumber
     * @return $this
     */
    public function setOntSerialNumber(?string $ontSerialNumber): self
    {
        $this->ontSerialNumber = $ontSerialNumber;
        return $this;
    }
}
