<?php

namespace Database\Seeders\Production;

use App\Models\Prefecture;
use App\Services\CsvService;
use Illuminate\Database\Seeder;

class ProductionPrefecture extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 厚生労働省情報を準じて登録します
     */
    public function run(): void
    {
        $csv_sevice = new CsvService(storage_path('seeder_data/prefecture.csv'));
        $csv_data_list_arr = $csv_sevice->convertFileToArray(is_cut_header: false);

        foreach ($csv_data_list_arr as $csv_data_arr) {
            Prefecture::create([
                'id'                    => $csv_data_arr[0],
                'code'                  => $csv_data_arr[1],
                'name'                  => $csv_data_arr[2],
                'prefectural_capital'   => $csv_data_arr[3],
            ]);
        }
    }
}
