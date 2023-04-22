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
        //todo testing
        try {
            DB::beginTransaction();
            $categoryId = $this->getCategoryId($data['category']);
            $tagIds = $this->getTagIdArray($data['tags']);

            $post = Post::create([
                'title' => $data['title'],
                'user_id' => $data['user_id'],
                'content' => $data['content'],
                'category_id' => $categoryId,
            ]);

            $post->tags->attach($tagIds);
            DB::commit();


        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    function update($data, $post)
    {
        //todo testing
        try {
            DB::beginTransaction();
            $categoryId = $this->getCategoryId($data['category']);
            $tagIds = $this->getTagIdArray($data['tags']);

            $post->update([
                'title' => $data['title'],
                'user_id' => $data['user_id'],
                'content' => $data['content'],
                'category_id' => $categoryId,
            ])->fresh();

            $post->tags->attach($tagIds);
            DB::commit();


        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;

    }


    private function getCategoryId($category)
    {
        return isset($category['id']) ?
            Category::find($category['id'])->update(['name' => $category['name']])->fresh()->id :
            Category::create(['name' => $category['name']])->id;
    }

    private function getTagIdArray($tags)
    {
        $result = [];
        foreach ($tags as $tag) {
            $id = isset($tag['id']) ? Tag::find($tag['id'])->update(['name' => $tag['name']])->fresh()->id :
                Tag::create(['name' => $tag['name']])->id;
            $result[] = $id;
        }
        return $result;
    }

}

