<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest\Enum;

enum SubnetType: string
{
    case Unknown  = 'Unknown';
    case Primary  = 'Primary';
    case Secondary = 'Secondary';
    case StaticRoute = 'StaticRoute';
}