<?php

namespace Inserve\RoutITAPI\Request\LineDiagnoseRequest\Enum;

enum SymptomCode: string
{
    case Sym103 = 'Sym103'; // Geen verbinding (No WBA connection)
    case Sym104 = 'Sym104'; // Trage verbinding (Slow WBA connection)
    case Sym105 = 'Sym105'; // Instabiele verbinding (Instable WBA connection)
    case Sym111 = 'Sym111'; // Wel sync/geen data
}