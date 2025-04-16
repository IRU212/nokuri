<?php

namespace App\Enum;

enum UserStatus: int
{
    case ACTIVE = 1;
    case RESET = 2;
    case DELETED = 3;

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'アクティブ',
            self::RESET => 'パスワードリセット',
            self::DELETED => '削除済み',
        };
    }
}
