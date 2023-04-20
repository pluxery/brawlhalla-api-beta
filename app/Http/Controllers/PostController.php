<?php

namespace App\Http\Controllers;

use App\Http\Filters\Post\Filter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
//todo make resourse controller/ make service/ make policy/ other conrtollers
    function index(FilterRequest $request): AnonymousResourceCollection
    {
        $data = $request->validated();
        $filter = app()->make(Filter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        return PostResource::collection($posts);

    }

    function store()
    {

    }

    function edit(Post $post)
    {

    }

    function update(Post $post)
    {

    }

    function destroy(Post $post)
    {

    }

}
