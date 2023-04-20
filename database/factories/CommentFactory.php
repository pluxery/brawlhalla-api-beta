<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => User::get()->random()->id,
            'post_id' => Post::get()->random()->id,
            'text' => $this->faker->text,
            'likes' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
