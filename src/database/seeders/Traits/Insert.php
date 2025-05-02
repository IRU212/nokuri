<?php

namespace Database\Seeders\Traits;

trait Insert {
    private static function insertArray(array $columns, array $data_list, $model, bool $is_query_delete = true)
    {
        if ($is_query_delete) {
            // マスタデータをリセットするためにデータを一括削除
            $model->query()->delete();
        }

        // マスタデータを挿入
        foreach ($data_list as $data) {
            $model->query()->create(\array_combine($columns, $data));
        }
    }
}