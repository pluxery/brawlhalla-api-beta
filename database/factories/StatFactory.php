<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attack' => random_int(1,10),
            'dexterity' => random_int(1,10),
            'defend' => random_int(1,10),
            'speed' => random_int(1,10),
        ];
    }
}
