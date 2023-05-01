<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Legend;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Report;
use App\Models\Stat;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserFavoriteLegend;
use App\Models\Weapon;
use Database\Factories\PostTagFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        (new PostSeeder)->run();
        (new LegendSeeder)->run();

        UserFavoriteLegend::factory(70)->create();

    }
}
