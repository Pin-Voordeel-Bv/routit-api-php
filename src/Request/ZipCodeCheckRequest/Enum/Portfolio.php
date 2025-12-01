<?php
namespace Inserve\RoutITAPI\Request\ZipCodeCheckRequest\Enum;

enum Portfolio: string
{
    case Business   = 'Business';
    case SMB        = 'SMB';
    case Teleworker = 'Teleworker';
    case All        = 'All';
}