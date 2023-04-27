<?php

namespace Database\Seeders;

use App\Models\Legend;
use App\Models\RatingLegend;
use App\Models\Stat;
use App\Models\Weapon;
use Illuminate\Database\Seeder;

class LegendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weapon::factory(25)->create();
        Stat::factory(50)->create();
        Legend::factory(50)->create();
        RatingLegend::factory(200)->create();
    }
}
