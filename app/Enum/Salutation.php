<?php

namespace App\Enum;

use Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler;

enum Salutation : string {
    case MR = 'Herr';
    case MS = 'Frau';
    case Other ="Divers";

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

}
