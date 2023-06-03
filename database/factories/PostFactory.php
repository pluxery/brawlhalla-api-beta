<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image' => 'post_images/default_img.png',
            'description'=>$this->faker->sentence,
            'content' => $this->faker->text,
            'category_id' => Category::get()->random()->id,
            'user_id' => User::get()->random()->id,
        ];
    }
}
