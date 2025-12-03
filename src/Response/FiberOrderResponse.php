<?php

namespace Inserve\RoutITAPI\Response;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 *
 */
final class FiberOrderResponse
{
    #[SerializedName('OrderId')]
    protected ?int $orderId = null;

    #[SerializedName('ServiceId')]
    protected ?string $serviceId = null;

    /**
     * @return string|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int|null $orderId
     *
     * @return $this
     */
    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getServiceId(): ?string
    {
        return $this->serviceId;
    }

    /**
     * @param string|null $serviceId
     *
     * @return $this
     */
    public function setServiceId(?string $serviceId): self
    {
        $this->serviceId = $serviceId;

        return $this;
    }
}
