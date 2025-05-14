<?php

namespace Database\Seeders\Production;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

final class ProductionNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $params = [
            ['id' => 1, 'title' => 'サイトリリース記念', 'body' => 'サイトリリースする事が無事できました！'],
            ['id' => 2, 'title' => '協同開発者募集', 'body' => '一緒にチーム開発の勉強を行いませんか？'],
        ];
        News::upsert($params, ['id'], ['updated_at']);
    }
}
