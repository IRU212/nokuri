<?php

namespace Database\Seeders\Production;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProductionBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        Banner::create(['image' => asset('/img/test.webp'), 'sort' => 1]);
        Banner::create(['image' => asset('/img/test.webp'), 'sort' => 2]);
        Banner::create(['image' => asset('/img/test.webp'), 'sort' => 3]);
    }
}
