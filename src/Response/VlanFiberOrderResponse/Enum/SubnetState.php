<?php

namespace Inserve\RoutITAPI\Response\VlanFiberOrderResponse\Enum;

enum SubnetState: string
{
    case Unknown      = 'Unknown';
    case Activate     = 'Activate';
    case Active       = 'Active';
    case PrivateEmpty = 'PrivateEmpty';
    case Terminate    = 'Terminate';
    case Terminated   = 'Terminated';
}