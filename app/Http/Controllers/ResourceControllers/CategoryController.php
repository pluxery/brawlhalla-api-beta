<?php

namespace App\Http\Controllers\ResourceControllers;

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


    function show(Category $category)
    {
        return new CategoryResource($category);
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
