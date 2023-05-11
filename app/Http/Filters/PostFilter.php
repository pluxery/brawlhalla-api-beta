<?php


namespace App\Http\Filters;


use App\Models\PostTag;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{

    protected function getCallbacks(): array
    {
        return [
            'tag' =>[$this, 'tag'],
            'title' => [$this, 'title'],
            'content' => [$this, 'content'],
            'category' => [$this, 'category'],
            'author' => [$this, 'author']
        ];
    }
    public function tag(Builder $queryBuilder, $value): Builder
    {
        $posts =  PostTag::select('post_id')->where('tag_id', "$value")->get();
        return $queryBuilder->whereIn('id', $posts);
    }
    public function title(Builder $queryBuilder, $value): Builder
    {

        return $queryBuilder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $queryBuilder, $value): Builder
    {

        return $queryBuilder->where('content', 'like', "%{$value}%");
    }

    public function category(Builder $queryBuilder, $value): Builder
    {
        return $queryBuilder->where('category_id', '=', "{$value}");
    }

    public function author(Builder $queryBuilder, $value): Builder
    {
        return $queryBuilder->where('user_id', '=', "{$value}");
    }
}
