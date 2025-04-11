<?php

namespace Database\Seeders\Production;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class ProductionBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create(['image' => asset('/img/test.webp'), 'sort' => 1]);
        Banner::create(['image' => asset('/img/test.webp'), 'sort' => 2]);
        Banner::create(['image' => asset('/img/test.webp'), 'sort' => 3]);
    }
}
