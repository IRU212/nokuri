<?php

namespace App\Services;

use App\Enum\GoogleDriveMimeType;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google_Client;
use Google\Service\Sheets;

final class GoogleDriveService
{
    /**
     * @var Google_Client
     */
    public readonly Google_Client $google_client;

    /**
     * 初期化処理
     */
    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setAuthConfig(config_path('client_secret.json'));
        $this->google_client->setScopes(['https://www.googleapis.com/auth/drive']);
    }

    /**
     * シートを取得します
     *
     * @param string $sheet_id
     * @param array $range
     * @return void
     */
    public function get(string $sheet_id, $range = [])
    {
        return $this->getSheets()->spreadsheets_values->get($sheet_id, $range);
    }

    /**
     * ファイルをアップロードする
     *
     * @param array $folder_ids
     * @param string $file_name
     * @param string $tmp_file_path
     * @return void
     */
    public function upload(array $folder_ids, string $file_name, string $tmp_file_path, GoogleDriveMimeType $mime_type): void
    {
        $drive_client = $this->getDriveClient();

        $file_metadata = new DriveFile([
            'name' => $file_name,
            'parents' => $folder_ids,
        ]);

        $drive_client->files->create($file_metadata, [
            'data' => \file_get_contents($tmp_file_path),
            'mimeType' => $mime_type->value,
            'uploadType' => 'media',
            'fields' => 'id',
        ]);
    }

    /**
     * シートサービスを使用
     *
     * @return Sheets
     */
    private function getSheets(): Sheets
    {
        return new Sheets($this->google_client);
    }

    /**
     * ドライブサービスを使用
     *
     * @return Drive
     */
    private function getDriveClient(): Drive
    {
        return new Drive($this->google_client);
    }
}
