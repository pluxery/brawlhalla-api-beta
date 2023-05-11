<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user_id = User::get()->random()->id;
        $subscriber_id = User::get()->random()->id;
        while ($user_id === $subscriber_id){
            $user_id = User::get()->random()->id;
            $subscriber_id = User::get()->random()->id;
        }
        return [
            'user_id' => $user_id,
            'subscription_id' => $subscriber_id
        ];
    }

}
