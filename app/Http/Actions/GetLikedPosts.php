<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollectionResource;
use App\Models\Post;
use App\Models\User;

class GetLikedPosts extends Controller
{
    function __invoke(User $user){
        $likedPosts = [];
        foreach ($user->likedPosts as $post){
            $likedPosts[] = Post::find($post->id);
        }
        return PostCollectionResource::collection($likedPosts);
    }
}
