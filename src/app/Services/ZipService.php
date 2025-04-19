<?php

namespace App\Services;

use ZipArchive;

final class ZipService
{
    private readonly ZipArchive $zip_archive;

    public function __construct()
    {
        $this->zip_archive = new ZipArchive();
    }

    public function compress(string $file_path): void
    {
        $zip_archive = $this->zip_archive;

        if ($zip_archive->open($file_path, ZipArchive::CREATE)) {
            $zip_archive->addFile("{$this->getFileBaseName($file_path)}.zip");
            $zip_archive->close();
        }
    }

    private function getFileBaseName(string $file_path): string
    {
        return \pathinfo($file_path, PATHINFO_BASENAME);
    }
}
