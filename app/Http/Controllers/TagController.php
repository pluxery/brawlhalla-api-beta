<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    function index()
    {
        $tags = Tag::all();
        return TagResource::collection($tags);
    }

    function store()
    {
        $tag = Tag::firstOrCreate(request()->validate([
            'name' => 'required|string',
        ]));
        return new TagResource($tag);
    }

    function create()
    {
    }

    function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    function edit(Tag $tag)
    {
    }


    function update(Tag $tag)
    {
        $tag->update(request()->validate([
            'title' => 'required|string',
        ]));
        return new TagResource($tag);
    }

    function destroy(Tag $tag)
    {
        return $tag->delete();
    }

}
