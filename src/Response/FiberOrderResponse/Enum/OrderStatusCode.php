<?php

namespace Inserve\RoutITAPI\Response\FiberOrderResponse\Enum;

enum OrderStatusCode: string
{
    case Accepted = 'Accepted';
    case Active = 'Active';
    case ModifyPending = 'ModifyPending';
    case Modified = 'Modified';
}