<?php

namespace Inserve\RoutITAPI\Response;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class State
{
    #[SerializedName('Code')]
    private ?int $code = null;

    #[SerializedName('Message')]
    private ?string $message = null;

    /**
     * Raw comments structure as deserialized from XML.
     *
     * XML:
     * <Comments>
     *     <string>Customer not found</string>
     *     <string>Something else</string>
     * </Comments>
     *
     * @var array<string,mixed>|string[]|null
     */
    #[SerializedName('Comments')]
    private array|null $comments = null;

    // ───────── Code ─────────

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;
        return $this;
    }

    // ───────── Message ─────────

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    // ───────── Comments (raw) ─────────

    /**
     * Raw comments array as deserialized.
     *
     * Might be:
     * - ['string' => ['Customer not found', '...']]
     * - ['Customer not found', '...']
     * - null
     */
    public function getCommentsRaw(): array|null
    {
        return $this->comments;
    }

    /**
     * @param array<string,mixed>|string[]|null $comments
     */
    public function setComments(array|null $comments): self
    {
        $this->comments = $comments;
        return $this;
    }

    // ───────── Comments (normalized strings) ─────────

    /**
     * Always returns a flat list of comment strings.
     *
     * @return string[]
     */
    public function getComments(): array
    {
        if ($this->comments === null) {
            return [];
        }

        // Case 1: ['string' => ['Customer not found', '...']]
        if (isset($this->comments['string'])) {
            $value = $this->comments['string'];

            if (is_array($value)) {
                // multiple <string> elements
                return array_values(array_filter($value, 'is_string'));
            }

            if (is_string($value)) {
                // single <string> element
                return [$value];
            }
        }

        // Case 2: already a simple list of strings
        if (is_array($this->comments)) {
            return array_values(
                array_filter($this->comments, 'is_string')
            );
        }

        return [];
    }
}