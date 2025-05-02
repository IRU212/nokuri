<?php

namespace App\Enum;

use App\Contracts\EnumBaseInterface;

enum Week: int implements EnumBaseInterface {
    case SUNDAY = 1;
    case MONDAY = 2;
    case TUESDAY = 3;
    case WEDNESDAY = 4;
    case THURSDAY = 5;
    case FRIDAY = 6;
    case SATURDAY = 7;

    public function label(): string
    {
        return match ($this) {
            self::SUNDAY    => "日曜日",
            self::MONDAY    => "月曜日",
            self::TUESDAY   => "火曜日",
            self::WEDNESDAY => "水曜日",
            self::THURSDAY  => "木曜日",
            self::FRIDAY    => "金曜日",
            self::SATURDAY  => "土曜日"
        };
    }
}