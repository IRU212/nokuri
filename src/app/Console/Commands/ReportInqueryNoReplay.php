<?php

namespace App\Console\Commands;

use App\Mail\ReportInqueryNoReply;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

final class ReportInqueryNoReplay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report-inquery-no-replay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '問い合わせの未返信を報告します';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::channel($this->signature)->info('bath log start');

        try {
            Mail::send(new ReportInqueryNoReply());
        } catch (Exception $e) {
            Log::channel($this->signature)->error($e->getMessage());
        }

        Log::channel($this->signature)->info("bath log end");
    }
}
