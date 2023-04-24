<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeaponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image'=>$this->faker->imageUrl
        ];
    }
}
