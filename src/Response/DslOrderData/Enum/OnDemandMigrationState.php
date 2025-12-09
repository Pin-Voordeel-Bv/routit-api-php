<?php

namespace Inserve\RoutITAPI\Response\DslOrderData\Enum;

enum OnDemandMigrationState: string
{
    case Ordered                     = 'Ordered';
    case Confirmed                   = 'Confirmed';
    case Rejected                    = 'Rejected';
    case Executed                    = 'Executed';
    case ReplanningRequestedByScheduler = 'ReplanningRequestedByScheduler';
    case ReplannedByScheduler        = 'ReplannedByScheduler';
}