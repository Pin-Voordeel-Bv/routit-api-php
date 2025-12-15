<?php
declare(strict_types=1);

namespace Inserve\RoutITAPI\Response\RePlanDslOrderResponse;

use Inserve\RoutITAPI\Response\Enum\ModifiedStatusCode;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifiedStatus
{
    #[SerializedName('Code')]
    private ?string $code = null;

    /**
     * Raw messages structure as deserialized from XML.
     *
     * XML example:
     * <Messages>
     *   <string>Note 1</string>
     *   <string>Note 2</string>
     * </Messages>
     *
     * @var array<string,mixed>|string[]|null
     */
    #[SerializedName('Messages')]
    private array|null $messages = null;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getCodeEnum(): ?ModifiedStatusCode
    {
        return $this->code !== null
            ? ModifiedStatusCode::tryFrom($this->code)
            : null;
    }

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

        if (isset($this->messages['string'])) {
            $value = $this->messages['string'];

            if (is_array($value)) {
                return array_values(array_filter($value, 'is_string'));
            }

            if (is_string($value)) {
                return [$value];
            }
        }

        if (is_array($this->messages)) {
            return array_values(array_filter($this->messages, 'is_string'));
        }

        return [];
    }
}