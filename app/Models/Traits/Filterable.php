<?php

namespace App\Models\Traits;

use App\Http\Filters\IFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{

    public function scopeFilter(Builder $queryBuilder, IFilter $filter){
        $filter->apply($queryBuilder);
        return $queryBuilder;
    }

}
