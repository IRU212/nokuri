<?php

namespace App\Enum;

enum UserStatus: int
{
    case ACTIVE = 1;
    case PASSWORD_RESET = 2;
    case DELETED = 3;

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE            => 'アクティブ',
            self::PASSWORD_RESET    => 'パスワードリセット',
            self::DELETED           => '削除済み',
        };
    }

    /**
     * スタイル
     *
     * @return string
     */
    public function badgeStyleClass():string
    {
        $layout_button_color_enum = LayoutButtonColor::class;

        return match ($this) {
            self::ACTIVE            => "badge badge-sm bg-gradient-{$layout_button_color_enum::SUCCESS->value}",
            self::PASSWORD_RESET    => "badge badge-sm bg-gradient-{$layout_button_color_enum::WARNING->value}",
            self::DELETED           => "badge badge-sm bg-gradient-{$layout_button_color_enum::PRIMARY->value}",
        }; 
    }
}
