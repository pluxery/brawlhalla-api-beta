<?php

namespace App\Services;

use App\Http\Filters\PostFilter;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function index($data)
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        return Post::filter($filter)->get()->all();
    }

    function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['category'])) {
                $categoryId = Category::firstOrCreate(['name' => $data['category']['name']])->id;
                $data["category_id"] = $categoryId;
                unset($data['category']);
            }
            $data['user_id'] = auth()->user()->id;
            $post = Post::create($data);
            if (isset($data['tags']))
                $post->tags()->attach($this->getTagIds($data['tags']));
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    function update($data, $post)
    {

        try {
            DB::beginTransaction();
            if (isset($data['category'])) {
                $categoryId = Category::firstOrCreate(['name' => $data['category']['name']])->id;
                $data["category_id"] = $categoryId;
                unset($data['category']);
            }
            $post->update($data);
            if (isset($data['tags']))
                $post->tags()->sync($this->getTagIds($data['tags']));
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    private function getTagIds($tags): array
    {
        $result = [];
        foreach ($tags as $tag) {
            $model = Tag::firstOrCreate(['name' => $tag['name']]);
            $result[] = $model->id;
        }
        return $result;
    }
}

