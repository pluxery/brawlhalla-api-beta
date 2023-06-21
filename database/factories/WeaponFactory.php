<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class WeaponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $idx = random_int(0, 7);
        return [
            'name' => $this->faker->word,
            'image'=> "weapons/weapon_${idx}.webp"
        ];
    }
}
