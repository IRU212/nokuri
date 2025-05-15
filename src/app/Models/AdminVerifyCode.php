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
     * メールアドレスが有効か判定を返します
     * 
     * @param string $email
     * @return void
     */
    public static function shouldDelete(string $email): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $token_deadline_at = self::query()->firstWhere('email', $email)?->token_deadline_at;

        if ($token_deadline_at === null) {
            Log::info("対象のメールアドレスのデータがないため削除する必要なし");
            return false;
        }

        $now_datetime = now();

        Log::info("コードが有効時間内か比較を行います > 現在時刻 : {$now_datetime}、 コード有効期限 : {$token_deadline_at}");

        // 現在時刻 >= コード有効期限 (現在時刻の方が大きい場合は有効期限外なので削除する必要あり)
        return $now_datetime->gte($token_deadline_at);
    }
}
