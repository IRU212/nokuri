<?php

namespace Database\Seeders\Production;

use App\Models\WorkOut;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class ProductionWorkOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            ['id' => 1, 'name' => 'ダンベルショルダープレス', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 2, 'name' => 'ダンベルサイドレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 3, 'name' => 'ダンベルフロントレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 4, 'name' => 'ダンベルリアレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 5, 'name' => 'バーベルショルダープレス', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 6, 'name' => 'バーベルアップライトロウ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 7, 'name' => 'バーベルフロントレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 8, 'name' => 'ケーブルショルダープレス', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 9, 'name' => 'ケーブルサイドレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 10, 'name' => 'ケーブルリアレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 11, 'name' => 'ケーブルフロントレイズ', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 12, 'name' => 'ショルダープレスマシン', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 13, 'name' => 'ラテラルレイズマシン', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
            ['id' => 14, 'name' => 'ペクトラルフライマシン', 'is_exercise_equipment' => true, 'is_bodyweight' => false],
        ];
        WorkOut::upsert($params);
    }
}
