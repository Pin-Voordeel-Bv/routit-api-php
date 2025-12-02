<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest\Enum;

enum SubnetPriority: string
{
    case P90  = 'P90';  // high
    case P100 = 'P100'; // default
    case P110 = 'P110'; // low
}