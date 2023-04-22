<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    function store()
    {
        $category = Category::firstOrCreate(request()->validate([
            'name' => 'required|string',
        ]));
        return new CategoryResource($category);
    }

    function create()
    {
    }

    function show(Category $category)
    {
        return new CategoryResource($category);
    }

    function edit(Category $category)
    {
    }


    function update(Category $category)
    {
        $category->update(request()->validate([
            'name' => 'required|string',
        ]));
        return new CategoryResource($category);

    }

    function destroy(Category $category)
    {
        return $category->delete();
    }
}
