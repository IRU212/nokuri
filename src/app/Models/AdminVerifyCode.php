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
     * コードが有効か判定を返します
     * 
     * @param string $email
     * @return void
     */
    public static function isCodeValid(string $email): bool
    {
        $token_deadline_at = self::query()->firstWhere('email', $email)?->token_deadline_at ?? throw new ModelNotFoundException();

        $now_datetime = now();

        Log::info("コードが有効時間内か比較を行います > 現在時刻 : {$now_datetime} >= コード有効期限 : {$token_deadline_at}");

        return $now_datetime->lte($token_deadline_at);
    }
}
