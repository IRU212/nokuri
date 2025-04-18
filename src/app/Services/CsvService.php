<?php

namespace App\Services;

final class CsvService
{
    private readonly string $file_path;

    public function __construct(string $file_path)
    {
        $this->setFile($file_path);
    }

    public function convertFileToArray($is_cut_header = true): array
    {
        $file_content_array_list = \file($this->file_path);

        $result = [];

        if ($is_cut_header) {
            $file_content_array_list = \array_splice($file_content_array_list, 1);
        }
        foreach ($file_content_array_list as $file_content_array_item) {
            $result[] = \explode(",", $file_content_array_item);
        }

        return $result;
    }
    
    public function setFile(string $file_path): void
    {
        $this->file_path = $file_path;
    }
}
