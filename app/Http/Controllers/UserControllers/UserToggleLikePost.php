<?php

namespace App\Http\Controllers\UserControllers;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserToggleLikePost extends Controller
{
    function __invoke(Post $post, Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);
        $user = User::find($request->user_id);
        $user->likedPosts()->toggle($post->id);
        return $post->likes;
    }
}
