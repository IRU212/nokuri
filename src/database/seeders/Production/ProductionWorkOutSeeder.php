<?php

namespace Database\Seeders\Production;

use App\Enum\SpecificArea;
use App\Models\WorkOut;
use App\Services\CsvService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

final class ProductionWorkOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $csv_sevice = new CsvService(storage_path('seeder_data/work_out.csv'));
        $csv_data_list_arr = $csv_sevice->convertFileToArray();

        foreach ($csv_data_list_arr as $csv_data_arr) {
            WorkOut::create([
                'id'                    => $csv_data_arr[0],
                'name'                  => $csv_data_arr[1],
                'is_exercise_equipment' => $csv_data_arr[2],
                'is_bodyweight'         => $csv_data_arr[3],
                'main_specific_area'    => SpecificArea::getIdFromLabel($csv_data_arr[4]),
            ]);
        }
    }
}
