<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Response\Enum\DeclinedStatusCode;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class DeclinedStatus
{
    #[SerializedName('Code')]
    private ?string $code = null;

    /**
     * Raw messages structure as deserialized from XML.
     *
     * XML example:
     * <Messages>
     *   <string>Customer not found</string>
     *   <string>Something else</string>
     * </Messages>
     *
     * @var array<string,mixed>|string[]|null
     */
    #[SerializedName('Messages')]
    private array|null $messages = null;

    // ───────── Code ─────────

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getCodeEnum(): ?DeclinedStatusCode
    {
        return $this->code !== null
            ? DeclinedStatusCode::tryFrom($this->code)
            : null;
    }

    // ───────── Messages (raw) ─────────

    /**
     * @return array<string,mixed>|string[]|null
     */
    public function getMessagesRaw(): array|null
    {
        return $this->messages;
    }

    /**
     * @param array<string,mixed>|string[]|null $messages
     */
    public function setMessages(array|null $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    // ───────── Messages (flattened strings) ─────────

    /**
     * Always returns a flat list of message strings.
     *
     * @return string[]
     */
    public function getMessages(): array
    {
        if ($this->messages === null) {
            return [];
        }

        // Case 1: ['string' => ['msg1', 'msg2']]
        if (isset($this->messages['string'])) {
            $value = $this->messages['string'];

            if (is_array($value)) {
                return array_values(array_filter($value, 'is_string'));
            }

            if (is_string($value)) {
                return [$value];
            }
        }

        // Case 2: already a flat array of strings
        if (is_array($this->messages)) {
            return array_values(array_filter($this->messages, 'is_string'));
        }

        return [];
    }
}