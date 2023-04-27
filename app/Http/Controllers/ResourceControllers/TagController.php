<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    function index()
    {
        return TagResource::collection(Tag::all());
    }

    function store()
    {
        $tag = Tag::firstOrCreate(request()->validate([
            'name' => 'required|string',
        ]));
        return new TagResource($tag);
    }


    function show(Tag $tag)
    {
        return new TagResource($tag);
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
