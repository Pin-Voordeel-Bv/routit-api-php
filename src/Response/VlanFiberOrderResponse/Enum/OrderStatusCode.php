<?php

namespace Inserve\RoutITAPI\Response\VlanFiberOrderResponse\Enum;

enum OrderStatusCode: string
{
    case Accepted     = 'Accepted';
    case Active       = 'Active';
    case ModifyPending = 'ModifyPending';
    case Modified     = 'Modified';
}