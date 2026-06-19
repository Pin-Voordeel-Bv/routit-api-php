<?php

namespace Inserve\RoutITAPI\Exception;

use Exception;
use Throwable;

final class RoutITAPIException extends Exception
{
    private ?array $details = null;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null, ?array $details = null)
    {
        parent::__construct($message, $code, $previous);
        $this->details = $details;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }
}
