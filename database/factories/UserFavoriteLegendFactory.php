<?php

namespace Database\Factories;

use App\Models\Legend;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFavoriteLegendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'legend_id' => Legend::get()->random()->id
        ];
    }
}
