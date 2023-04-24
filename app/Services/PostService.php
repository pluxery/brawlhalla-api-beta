<?php

namespace App\Services;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\UpdateRequest;
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

            $post = Post::create([
                'title' => $data['title'],
                'user_id' => $data['user_id'],
                'content' => $data['content'],
            ]);
            $post->category = $this->getCategory($data['category']);
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

            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
            $post->category = $this->getCategory($data['category']);
            $post->tags()->sync($this->getTagIds($data['tags']));
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }


    private function getCategory($category)
    {
        if (isset($category['id'])) {
            $model = Category::find($category['id']);
            $model->update(['name' => $category['name']]);
            return $model;
        } else {
            return Category::create(['name' => $category['name']]);
        }
    }

    private function getTagIds($tags)
    {
        $result = [];
        foreach ($tags as $tag) {
            if (isset($tag['id'])) {
                $model = Tag::find($tag['id']);
                $model->update(['name' => $tag['name']]);
                $result[] = $model->id;
            } else {
                $model=Tag::create(['name' => $tag['name']]);
                $result[] = $model->id;
            }
        }
        return $result;
    }
}

