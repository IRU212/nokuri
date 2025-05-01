<?php

namespace Database\Seeders\Production;

use App\Models\Prefecture;
use App\Services\CsvService;
use Database\Seeders\Traits\Insert;
use Illuminate\Database\Seeder;

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
        $columns = ['id', 'code', 'name', 'prefectural_capital'];
        $csv_data = (new CsvService(storage_path('seeder_data/prefecture.csv')))->convertFileToArray(is_cut_header: false);
        $model = new Prefecture();

        $this->insertArray($columns, $csv_data, $model);
    }
}
