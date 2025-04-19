<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserDailySummary;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

final class SummaryUserDailyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'summary-user-daily-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '毎日ユーザーデータを集計してテーブルに登録します';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::channel($this->signature)->info('bath log start');

        $user = new User();
        $user_daily_summary = new UserDailySummary();

        try {
            $user_daily_summary->create([
                'register_count'             => $user->query()->whereDate('created_at', now()->today())->count(),
                'register_user_ids_json'     => $user->query()->select('id')->whereDate('created_at', today())->get()->toJson(),
                'deleted_count'              => $user->query()->whereDate('deleted_at', now()->today())->count(),
                'deleted_user_ids_json'      => $user->query()->select('id')->whereDate('deleted_at', today())->get()->toJson(),
            ]);
        } catch (Exception $e) {
            Log::channel($this->signature)->error($e->getMessage());
        }

        Log::channel($this->signature)->info("bath log end");
    }
}
