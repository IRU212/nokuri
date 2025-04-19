<?php

namespace App\Jobs;

use App\Mail\UserAuthenticationMail;
use App\Models\UncertifiedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class UserAuthenticationJob implements ShouldQueue
{
    use Queueable;

    private readonly UncertifiedUser $uncertified_user;

    /**
     * 新しいジョブインスタンスの生成
     *
     * @return void
     */
    public function __construct(UncertifiedUser $uncertified_user)
    {
        $this->uncertified_user = $uncertified_user;
    }

    /**
     * ジョブの実行
     */
    public function handle(): void
    {
        Mail::send(new UserAuthenticationMail($this->uncertified_user));
    }

    /**
     * ジョブの失敗を処理
     *
     * @param Throwable $exception
     * @return void
     */
    public function failed(Throwable $exception): void
    {
        Log::info(__CLASS__ . " : ジョブが失敗しました");
        Log::error($exception->getMessage());
    }
}