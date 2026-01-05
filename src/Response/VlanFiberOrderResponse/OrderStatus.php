<?php

namespace Inserve\RoutITAPI\Response\VlanFiberOrderResponse;

use Inserve\RoutITAPI\Response\ArrayOfString;
use Inserve\RoutITAPI\Response\VlanFiber\Enum\OrderStatusCode;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class OrderStatus
{
    #[SerializedName('Code')]
    private ?string $code = null;

    #[SerializedName('Messages')]
    private ArrayOfString|array|null $messages = null;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getCodeEnum(): ?OrderStatusCode
    {
        return $this->code !== null ? OrderStatusCode::tryFrom($this->code) : null;
    }

    public function setCodeEnum(?OrderStatusCode $code): self
    {
        $this->code = $code?->value;
        return $this;
    }

    public function getMessagesRaw(): ArrayOfString|array|null
    {
        return $this->messages;
    }

    public function setMessages(ArrayOfString|array|null $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getMessages(): array
    {
        // If you use ArrayOfString class
        if ($this->messages instanceof ArrayOfString) {
            return $this->messages->getStrings();
        }

        // If Symfony gives ['string' => [...]] or 'string' => 'x'
        if (is_array($this->messages) && isset($this->messages['string'])) {
            $v = $this->messages['string'];
            if (is_string($v)) return [$v];
            if (is_array($v)) return array_values(array_filter($v, 'is_string'));
        }

        // Already array of strings
        if (is_array($this->messages)) {
            return array_values(array_filter($this->messages, 'is_string'));
        }

        return [];
    }
}