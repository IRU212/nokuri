<?php

namespace Database\Seeders\Production;

use App\Models\News;
use App\Models\WorkOut;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class ProductionNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            ['id' => 1, 'name' => 'サイトリリース記念', 'body' => 'サイトリリースする事が無事できました！'],
        ];
        News::upsert($params, ['id'], ['updated_at']);
    }
}
