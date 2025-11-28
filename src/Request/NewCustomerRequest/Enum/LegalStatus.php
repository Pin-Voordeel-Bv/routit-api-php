<?php

namespace Inserve\RoutITAPI\Request\NewCustomerRequest\Enum;

enum LegalStatus: string
{
    case Onbekend = 'Onbekend';
    case BV = 'BV';
    case NV = 'NV';
    case Stichting = 'Stichting';
    case Vereniging = 'Vereniging';
    case Eenmanszaak = 'Eenmanszaak';
    case VOF = 'VOF';
    case BV_i_o = 'BV i/o';
    case CV = 'CV';
    case COOP = 'COOP';
    case REDR = 'REDR';
    case KERK = 'KERK';
    case OWM = 'OWM';
    case BRO = 'BRO';
    case ADVOCAAT = 'ADVOCAAT';
    case NOTARIS = 'NOTARIS';
    case Accountant = 'Accountant';
}
