<?php

namespace Database\Factories;

use App\Models\Stat;
use App\Models\Weapon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LegendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->firstName,
            "image"=> $this->faker->imageUrl,
            "history" => $this->faker->text,
            "first_weapon_id" => Weapon::get()->random()->id,
            "second_weapon_id" => Weapon::get()->random()->id,
            "stats_id" => Stat::get()->random()->id,
        ];
    }
}
