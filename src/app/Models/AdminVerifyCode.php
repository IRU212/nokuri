<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

final class AdminVerifyCode extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'code',
        'token',
        'token_deadline_at',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'token_deadline_at' => 'datetime',
        ];
    }

    /**
     * 有効か判定を返します
     * 
     * @return boolean
     */
    public function isValid(): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $now_datetime = now();

        Log::info("コードが有効時間内か比較を行います > 現在時刻 : {$now_datetime}、 コード有効期限 : {$this->token_deadline_at}");

        // 現在時刻 <= コード有効期限
        return $now_datetime->lte($this->token_deadline_at);
    }

    /**
     * メールアドレスを削除するべきか判定します
     * 
     * @param string $email
     * @return void
     */
    public static function shouldDelete(string $email): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $admin_verify_code = self::query()->firstWhere('email', $email);

        if ($admin_verify_code === null) {
            Log::info("対象のメールアドレスのデータがないため削除する必要なし");
            return false;
        }

        $admin_verify_code_is_valid = $admin_verify_code->isValid();
        if ($admin_verify_code_is_valid) {
            Log::info("対象のメールアドレスのデータが有効期限内なので削除する必要なし");
            return false;
        }
        if ($admin_verify_code_is_valid === false) {
            Log::info("対象のメールアドレスのデータが有効期限外なので削除する必要あり");
            return true;
        }

        return false;
    }
}
