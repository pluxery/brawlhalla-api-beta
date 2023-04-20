<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Report;
use App\Models\Tag;
use App\Models\User;
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
        User::factory(100)->create();

        Category::factory(100)->create();
        Tag::factory(100)->create();
        Post::factory(100)->create();
        PostTag::factory(100)->create();

        Report::factory(20)->create();
        Comment::factory(150)->create();
    }
}
