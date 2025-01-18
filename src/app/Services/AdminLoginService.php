<?php

namespace App\Services;

use App\Models\AdminUser;

final class AdminLoginService
{
    /**
     * 管理者をログイン状態にします
     *
     * @param integer $admin_user_id
     * @return void
     */
    public static function login(int $admin_user_id): void
    {
        session(['admin_user_id' => $admin_user_id]);
    }

    /**
     * 管理者をログアウト状態にします
     *
     * @return void
     */
    public static function logout(): void
    {
        session()->forget('admin_user_id');
    }

    /**
     * 管理者がログイン状態か返します
     *
     * @return boolean
     */
    public static function is_login(): bool
    {
        return session('admin_user_id') !== null;
    }

    /**
     * ログイン中の管理者IDを取得します
     *
     * @return integer|null
     */
    public static function loginId(): int|null
    {
        return session('admin_user_id');
    }

    /**
     * ログイン中の管理者モデルを取得します
     *
     * @return AdminUser|null
     */
    public static function loginAdminUser(array|string $columns = ['*']): AdminUser|null
    {
        $admin_user_id = self::loginId();

        if ($admin_user_id === null) {
            return null;
        }

        return AdminUser::query()->where('id', $admin_user_id)->first($columns);
    }
}
