<?php

namespace Tests\unit;

use App\Http\Actions\ToggleLikePost;
use App\Models\Post;
use App\Models\User;
use Codeception\Test\Unit;
use Tests\arrangers\UserArranger;

class PostLikeTest extends Unit
{

    public function testPostLike()
    {
        $user = User::find(1);
        auth()->setUser($user);
        $post = Post::find(1);

        $act = new ToggleLikePost($post);

        self::assertContains($user, $post->likes());

        $user->delete();
        $post->delete();
    }

    public function testPostUnlike()
    {
        $user = User::find(1);
        auth()->setUser($user);
        $post = Post::find(1);

        $act = new ToggleLikePost($post);

        self::assertContains($user, $post->likes());

        $act = new ToggleLikePost($post);

        self::assertEmpty($post->likes());

        $user->delete();
        $post->delete();
    }

}
