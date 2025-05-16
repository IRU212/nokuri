<?php

namespace Database\Seeders\Production;

use App\Models\Prefecture;
use App\Services\CsvService;
use Database\Seeders\Traits\Insert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProductionPrefecture extends Seeder
{
    use Insert;

    /**
     * Run the database seeds.
     * 
     * 厚生労働省情報を準じて登録します
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $columns = ['id', 'code', 'name', 'prefectural_capital', 'lat', 'lan'];
        $csv_data = [];
        $csv_prefecture_data = (new CsvService(storage_path('seeder_data/prefecture.csv')))->convertFileToArray(is_cut_header: false);
        $csv_prefecture_lat_lon_data = (new CsvService(storage_path('seeder_data/prefecture_lat_lon.csv')))->convertFileToArray(is_cut_header: false);
        foreach ($csv_prefecture_data as $prefecture_data) {
            foreach ($csv_prefecture_lat_lon_data as $prefecture_lat_lon_data) {
                if ($prefecture_data[2] === $prefecture_lat_lon_data[0]) {
                    $csv_data[] = \array_merge($prefecture_data, [$prefecture_lat_lon_data[1], $prefecture_lat_lon_data[2]]);
                    continue 2;
                }
            }
        }
        $model = new Prefecture();

        $this->insertArray($columns, $csv_data, $model);
    }
}
