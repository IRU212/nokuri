<?php

namespace App\Enum;

use App\Contracts\EnumBaseInterface;

enum AdminUserStatus: int implements EnumBaseInterface {
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
