<?php

namespace Inserve\RoutITAPI\Response;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class NinaResponse
{
    #[SerializedName('IsSuccess')]
    public bool $isSuccess = false;

    #[SerializedName('ErrorCode')]
    public int $errorCode = 0;

    #[SerializedName('ErrorMessage')]
    public ?string $errorMessage = null;

    /** @var string[]|null */
    #[\Symfony\Component\Serializer\Annotation\SerializedPath('[ErrorDetails][string]')]
    public ?array $errorDetails = null;

    public function getIsSuccess(): ?bool
    {
        return $this->isSuccess;
    }

    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @return string[]|null
     */
    public function getErrorDetails(): ?array
    {
        return $this->errorDetails;
    }
}
