<?php

namespace Database\Seeders\Production;

use App\Models\WorkOut;
use App\Services\CsvService;
use Illuminate\Database\Seeder;

final class ProductionWorkOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv_sevice = new CsvService(storage_path('seeders/data/work_out.csv'));
        $csv_data_list_arr = $csv_sevice->convertFileToArray();

        foreach ($csv_data_list_arr as $csv_data_arr) {
            WorkOut::create([
                'id'                    => $csv_data_arr[0],
                'name'                  => $csv_data_arr[1],
                'is_exercise_equipment' => $csv_data_arr[2],
                'is_bodyweight'         => $csv_data_arr[3],
            ]);
        }
    }
}
