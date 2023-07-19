<?php

namespace Database\Factories;

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

        $imgIndex = random_int(0, 7);

        return [
            "name" => $this->faker->firstName,
            //ТУТ ИМЕНА НАПУТАЛ КАРТИНОК НО НИЧЕГО СТРАШНОГО
            "image" => "legends/avatars/main_${imgIndex}.webp",
            "main_image" => "legends/body/avatar_${imgIndex}.webp",
            "history" => $this->faker->text,
            "first_weapon_id" => Weapon::get()->random()->id,
            "second_weapon_id" => Weapon::get()->random()->id,
            'attack' => random_int(1, 10),
            'dexterity' => random_int(1, 10),
            'defend' => random_int(1, 10),
            'speed' => random_int(1, 10),
            'price' => random_int(900, 7200),

        ];
    }
}
