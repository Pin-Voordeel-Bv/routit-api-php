<?php

namespace Inserve\RoutITAPI\Response\Enum;

enum DeclinedStatusCode: string
{
    case Rejected        = 'Rejected';
    case ValidationError = 'ValidationError';
    case UnknownError    = 'UnknownError';
}