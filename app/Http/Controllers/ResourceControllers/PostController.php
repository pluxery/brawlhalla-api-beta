<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostCollectionResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public $service;

    function __construct(PostService $service) {
        $this->service = $service;
        $this->authorizeResource(Post::class, 'post');
    }

    function index(FilterRequest $request): AnonymousResourceCollection {

        $data = $request->validated();
        $posts = $this->service->index($data);
        return PostCollectionResource::collection($posts);
    }

    function show(Post $post): PostResource {
        return new PostResource($post);
    }

    function store(StoreRequest $request): PostResource {
        $data = $request->validated();
        $post = $this->service->store($data);
        if ($post instanceof Post) {
            return new PostResource($post);
        }
        return $post;
    }

    function update(UpdateRequest $request, Post $post) {
        $data = $request->validated();
        $this->service->update($data, $post);
        return new PostResource($post);
    }

    function destroy(Post $post) {
        return $post->delete();
    }

}
