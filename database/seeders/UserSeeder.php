<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use App\Models\UserFavoriteLegend;
use Database\Factories\SubscriptionFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Subscription::factory(100)->create();
    }
}
