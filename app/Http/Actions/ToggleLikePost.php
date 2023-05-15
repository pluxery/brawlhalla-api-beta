<?php

namespace App\Http\Actions;


use App\Http\Controllers\Controller;
use App\Models\Post;

class ToggleLikePost extends Controller
{
    function __invoke(Post $post)
    {

        $user = auth()->user();
        $user->likedPosts()->toggle($post->id);
        return $post->likes->count();
    }
}
