<?php

namespace App\Console\Commands;

use App\Enum\GoogleDriveMimeType;
use App\Exports\UserExport;
use App\Services\GoogleDriveService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

final class GenerateGoogleDriveFileUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-google-drive-file-user-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '毎日ユーザーデータをGoogle Drive スプレットシートに書き出します';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::channel($this->signature)->info('bath log start');

        $now = now()->format('Y-m-d');
        $file_name = "ユーザ一覧_{$now}.xlsx";
        $saved_file_path = storage_path("app/private/{$file_name}");

        Excel::store(new UserExport, $file_name);

        Log::channel($this->signature)->info("{$saved_file_path}に一時的なファイルの保存が完了");

        $google_drive_service = new GoogleDriveService();
        $google_drive_dir_id = '16TNaTBV7MMkdkI3-V88BK5PA2kRdCSK0';
        $google_drive_service->upload(
            [$google_drive_dir_id],
            $file_name,
            $saved_file_path,
            GoogleDriveMimeType::SHEET
        );

        Log::channel($this->signature)->info("GoogleDriveの{$google_drive_dir_id}ディレクトリに{$file_name}アップロードが完了");

        File::delete($saved_file_path);

        Log::channel($this->signature)->info("{$saved_file_path}に一時的なファイルの削除が完了");
        Log::channel($this->signature)->info("bath log end");
    }
}
