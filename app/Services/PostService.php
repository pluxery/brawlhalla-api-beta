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
            $categoryId = Category::firstOrCreate(['name' => $data['category']['name']])->id;
            $post = Post::create([
                'title' => $data['title'],
                'user_id' => $data['user_id'],
                'content' => $data['content'],
                'category_id' => $categoryId,

            ]);
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
            $categoryId = Category::firstOrCreate(['name' => $data['category']['name']])->id;
            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $categoryId
            ]);
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

