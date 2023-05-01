<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    function index(): AnonymousResourceCollection
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    function store(Request $request): CategoryResource
    {
        $category = Category::firstOrCreate($request->validate([
            'name' => 'required|string',
        ]));
        return new CategoryResource($category);
    }


    function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    function update(Category $category, Request $request)
    {
        $category->update($request->validate([
            'name' => 'required|string',
        ]));
        return new CategoryResource($category);

    }

    function destroy(Category $category)
    {
        return $category->delete();
    }
}
