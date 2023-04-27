<?php
namespace Database\Factories;

use App\Models\Legend;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingLegendFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'legend_id' => Legend::get()->random()->id,
            'rating' => random_int(0, 5),
        ];
    }
}
