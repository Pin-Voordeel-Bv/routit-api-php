<?php

namespace Inserve\RoutITAPI\Response\Enum;

enum FtthLineTestLineStatus: string
{
    case Up = 'Up';
    case Down = 'Down';
    case Testing = 'Testing';
    case Unknown = 'Unknown';
    case Dormant = 'Dormant';
    case Absent = 'Absent';
    case Lowerlayerdown = 'Lowerlayerdown';
    case Error = 'Error';
}