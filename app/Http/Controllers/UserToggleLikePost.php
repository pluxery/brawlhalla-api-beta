<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Models\UserPostLike;
use Illuminate\Http\Request;

class UserToggleLikePost extends Controller
{
    function __invoke(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'post_id' => 'required|integer'
        ]);
        $post = Post::find($request->post_id);
        $user = User::find($request->user_id);
        $user->likedPosts()->toggle($post->id);
        return $post->likes;
    }
}
