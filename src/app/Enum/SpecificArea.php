<?php

namespace App\Enum;

use App\Contracts\EnumBaseInterface;

enum SpecificArea: int implements EnumBaseInterface {
    case CHEST = 1;
    case BACK = 2;
    case SHOULDERS = 3;
    case ARMS = 4;
    case THIGHS = 5;
    case ABDOMINALS = 6;

    public function label(): string
    {
        return match ($this) {
            self::CHEST         => '胸',
            self::BACK          => '背中',
            self::SHOULDERS     => '肩',
            self::ARMS          => '腕',
            self::THIGHS        => '太もも',
            self::ABDOMINALS    => '腹部',
        };
    }

    public static function getIdFromLabel(string $label)
    {
        return match ($label) {
            '胸'        => self::CHEST,
            '背中'      => self::BACK,
            '肩'        => self::SHOULDERS,
            '腕'        => self::ARMS,
            '太もも'    => self::THIGHS,
            '腹部'      => self::ABDOMINALS,
        }; 
    }
}