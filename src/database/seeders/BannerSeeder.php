<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner = new Banner();

        $banner->fill(['image' => asset('/img/text.webp'), 'sort' => 1]);
        $banner->fill(['image' => asset('/img/text.webp'), 'sort' => 2]);
        $banner->fill(['image' => asset('/img/text.webp'), 'sort' => 3]);
    }
}
