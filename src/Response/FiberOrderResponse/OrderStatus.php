<?php

namespace Inserve\RoutITAPI\Response\FiberOrderResponse;

use Inserve\RoutITAPI\Response\ArrayOfString;
use Inserve\RoutITAPI\Response\FiberOrderResponse\Enum\OrderStatusCode;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class OrderStatus
{
    #[SerializedName('Code')]
    private ?string $code = null;

    /** @var string[]|null */
    #[SerializedName('Messages')]
    private ?ArrayOfString $messages = null;

    public function getCode(): ?string { return $this->code; }
    public function setCode(?string $code): self { $this->code = $code; return $this; }

    public function getCodeEnum(): ?OrderStatusCode
    {
        return $this->code !== null ? OrderStatusCode::tryFrom($this->code) : null;
    }

    /** @return string[] */
    public function getMessages(): array
    {
        return $this->messages?->getStrings() ?? [];
    }

    /** @param string[]|null $strings */
    public function setMessagesFromArray(?array $strings): self
    {
        $this->messages = $strings !== null ? (new ArrayOfString())->setStrings($strings) : null;
        return $this;
    }

    public function getMessagesNode(): ?ArrayOfString { return $this->messages; }
    public function setMessagesNode(?ArrayOfString $messages): self { $this->messages = $messages; return $this; }
}