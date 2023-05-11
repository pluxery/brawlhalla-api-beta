<?php
namespace App\Http\Controllers\PostControllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class AddCommentToPostController extends Controller
{
    function __invoke(Post $post, Request $request){
        $request->validate(['text' => 'string|required']);
        Comment::create(
            [
                'user_id' => auth()->user()->id,
                'post_id' => $post->id,
                'text' => $request['text']
            ]
            );
        return new PostResource($post);
    }
}
