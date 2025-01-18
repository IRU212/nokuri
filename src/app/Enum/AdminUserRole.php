<?php

namespace App\Enum;

enum AdminUserRole: int
{
    case MASTER = 1;
    case GENERAL = 2;

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MASTER => 'マスター',
            self::GENERAL => '一般',
        };
    }

    /**
     * 値の一覧を取得
     *
     * @return array
     */
    public static function values(): array
    {
        return \array_map(fn($enum) => $enum->value, self::cases());
    }
}
