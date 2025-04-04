<?php

namespace App\Services;

final class CsvService
{
    private const HEADER_SPLICE_INDEX = 1;

    private readonly string $file_path;

    private readonly string $file_content;

    public function __construct(string $file_path)
    {
        $this->setFile($file_path);
    }

    public function convertFileToArray($is_cut_header = true): array
    {
        $file_content_array_list = \explode("\n", $this->file_content);

        $result = [];

        if ($is_cut_header) {
            \array_splice($file_content_array_list, self::HEADER_SPLICE_INDEX);
        }
        foreach ($file_content_array_list as $file_content_array_item) {
            $result[] = \explode(",", $file_content_array_item);
        }

        return $result;
    }
    
    public function setFile(string $file_path): void
    {
        $this->file_path = $file_path;
        $this->file_content = \file_get_contents($this->file_path);
    }
}
