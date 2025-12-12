<?php

namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Response\ArrayOfString;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewDslOrderDeclinedState
{
    #[SerializedName('Code')]
    private ?int $code = null;

    #[SerializedName('Message')]
    private ?string $message = null;

    #[SerializedName('Comments')]
    private ?ArrayOfString $comments = null;

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getCommentsNode(): ?ArrayOfString
    {
        return $this->comments;
    }

    public function setCommentsNode(?ArrayOfString $comments): self
    {
        $this->comments = $comments;
        return $this;
    }

    /** @return string[] */
    public function getComments(): array
    {
        return $this->comments?->getStrings() ?? [];
    }

    /** @param string[]|null $strings */
    public function setComments(?array $strings): self
    {
        $this->comments = $strings !== null ? (new ArrayOfString())->setStrings($strings) : null;
        return $this;
    }
}