<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{

    function index()
    {
        return CommentResource::collection(Comment::all());
    }

    function store(StoreRequest $request)
    {
        $data = $request->validated();
        $comment = Comment::create($data);
        return new CommentResource($comment);

    }

    function show(Comment $comment)
    {

        return new CommentResource($comment);
    }

    function update()
    {

    }

    function destroy(Comment $comment)
    {
        return $comment->delete();

    }

}