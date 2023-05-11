<?php

namespace App\Services;

use App\Http\Filters\PostFilter;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function index($data) {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        return Post::filter($filter)->orderBy('created_at', 'desc')->paginate(10);
    }

    function store($data) {
        try {
            DB::beginTransaction();

            $post = Post::create([
                'user_id'=>auth()->user()->id,
                'title' => $data['title'],
                'content' => $data['content']
            ]);
            if (isset($data['category'])) {
                $post->update([
                    'category_id' => Category::firstOrCreate([
                        'name' => $data['category']])->id
                ]);
            }
            if (isset($data['tags'])) {
                $post->tags()->sync($this->getTagIds($data['tags']));
            }

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    function update($data, $post) {

        try {
            DB::beginTransaction();
            if (isset($data['category'])) {
                $categoryId = Category::firstOrCreate(['name' => $data['category']])->id;
                $data["category_id"] = $categoryId;
                unset($data['category']);
            }
            if (isset($data['tags'])) {
                $post->tags()->sync($this->getTagIds($data['tags']));
                unset($data['tags']);
            }
            $post->update($data);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }
    private function getTagIds($tags): array {
        $result = [];
        foreach ($tags as $tag) {
            $result[] = Tag::firstOrCreate(['name' => $tag])->id;
        }
        return $result;
    }
}