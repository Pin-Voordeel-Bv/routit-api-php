<?php

namespace Inserve\RoutITAPI\Request\NewDslOrderRequest\Enum;

enum IPVersion: string
{
    case IPv4 = 'IPv4';
    case IPv6 = 'IPv6';
}