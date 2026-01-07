<?php

namespace Inserve\RoutITAPI\Request\ModifyVlanFiberRequest\Enum;

enum ConnectionSpeedUnit: string
{
    case Mbps = 'Mbps';
    case Gbps = 'Gbps';
    case Kbps = 'Kbps';
}