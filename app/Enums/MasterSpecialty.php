<?php

namespace App\Enums;

enum MasterSpecialty: string
{
    case Hair = 'hair';
    case Nails = 'nails';
    case Makeup = 'makeup';

    public function label(): string
    {
        return match($this) {
            self::Hair => 'Перукар-стиліст',
            self::Nails => 'Майстер манікюру',
            self::Makeup => 'Візажист',
        };
    }
}
