<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
//todo make policy
class PostController extends Controller
{
    public $service;

    function __construct(PostService $service)
    {
        $this->service = $service;
    }

    function index(FilterRequest $request): AnonymousResourceCollection
    {
        dd(auth()->user());
        $data = $request->validated();
        $posts = $this->service->index($data);
        return PostResource::collection($posts);
    }

    function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    function store(StoreRequest $request): PostResource
    {
        $data = $request->validated();
        $post = $this->service->store($data);
        return new PostResource($post);
    }

    function update(UpdateRequest $request, Post $post)
    {

        $data = $request->validated();
        $this->service->update($data, $post);
        return new PostResource($post);
    }

    function destroy(Post $post)
    {
        return $post->delete();
    }

}
