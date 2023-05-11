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
use App\Models\UserPostLike;
use App\Models\Weapon;
use Database\Factories\PostTagFactory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(30)->create();
        Tag::factory(30)->create();
        Post::factory(100)->create();
        UserPostLike::factory(500)->create();
        PostTag::factory(120)->create();
        Report::factory(20)->create();
        Comment::factory(200)->create();
    }
}
