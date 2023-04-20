<?php


namespace App\Http\Filters\Post;

use App\Http\Filters\AbstractIFilter;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class Filter extends AbstractIFilter
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
        return $queryBuilder->where('author', '=', "{$value}");
    }

    //create filter by date
}
