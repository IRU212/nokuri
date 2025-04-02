<?php

namespace App\Enum;

use App\Contracts\EnumBaseInterface;

enum Gender: int implements EnumBaseInterface {
    case MAN = 1;
    case WOMAN = 2;
    case OTHER = 3;

    public function label(): string
    {
        return match ($this) {
            self::MAN   => '男性',
            self::WOMAN => '女性',
            self::OTHER => '不明',
        };
    }
}