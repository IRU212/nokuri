<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// 毎日00:00に実行
Schedule::daily()->group(function() {
    Schedule::command('summary-user-daily-data');
    Schedule::command('generate-google-drive-file-user-data');
});
// 毎日07:00に実行
Schedule::command('report-inquery-no-replay')->dailyAt('07:00');
