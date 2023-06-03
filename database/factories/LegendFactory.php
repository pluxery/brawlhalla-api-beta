<?php

namespace Database\Factories;

use App\Models\Stat;
use App\Models\Weapon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            "image"=>  "legends/ada_avatar.webp",
            "history" => $this->faker->text,
            "first_weapon_id" => Weapon::get()->random()->id,
            "second_weapon_id" => Weapon::get()->random()->id,
            'attack' => random_int(1,10),
            'dexterity' => random_int(1,10),
            'defend' => random_int(1,10),
            'speed' => random_int(1,10),
        ];
    }
}
