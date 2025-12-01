<?php

namespace Inserve\RoutITAPI\Request\CustomerDataRequest\Enum;

enum OrderByMember: string
{
    case Id               = 'Id';
    case Name             = 'Name';
    case Street           = 'Street';
    case ZipCode          = 'ZipCode';
    case City             = 'City';
    case Phone1           = 'Phone1';
    case Phone2           = 'Phone2';
    case DateCreated      = 'DateCreated';
    case IsActive         = 'IsActive';
    case ExternalId       = 'ExternalId';
    case DebitNr          = 'DebitNr';
    case FirstBillingDate = 'FirstBillingDate';
}