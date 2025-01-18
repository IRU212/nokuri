<?php

namespace App\Enum;

enum UserStatus: int
{
    case INACTIVE = 0;
    case ACTIVE = 1;

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::INACTIVE => '非アクティブ',
            self::ACTIVE => 'アクティブ',
        };
    }
}
