<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\ModifyFiberOrderRequest\ModifyFiberRequestData;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyFiberOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'ModifyFiberRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private ?int $orderId = null;

    #[SerializedName('ModifyFiberRequestData')]
    private ?ModifyFiberRequestData $modifyFiberRequestData = null;

    public function validate(): void
    {
        $errors = [];

        // Required: orderId must be a positive int
        if (!isset($this->orderId) || !is_int($this->orderId) || $this->orderId < 1) {
            $errors[] = "OrderId is required and must be a positive integer.";
        }

        // Validate nested ModifyFiberRequestData
        if (isset($this->modifyFiberRequestData)) {
            $errors = array_merge($errors, $this->modifyFiberRequestData->validate());
        } else {
            $errors[] = "modifyFiberRequestData must be present.";
        }

        Validator::throwIfErrors($errors);
    }

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
     * @return ModifyFiberRequestData|null
     */
    public function getModifyFiberRequestData(): ?ModifyFiberRequestData
    {
        return $this->modifyFiberRequestData;
    }

    /**
     * @param ModifyFiberRequestData|null $modifyFiberRequestData
     * @return $this
     */
    public function setModifyFiberRequestData(?ModifyFiberRequestData $modifyFiberRequestData): self
    {
        $this->modifyFiberRequestData = $modifyFiberRequestData;
        return $this;
    }
}
