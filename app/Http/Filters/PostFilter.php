<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{

    protected function getCallbacks(): array
    {
        return [
            'title' => [$this, 'title'],
            'content' => [$this, 'content'],
            'category' => [$this, 'category'],
            'author' => [$this, 'author'],
        ];
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

    //create filter by date
}
