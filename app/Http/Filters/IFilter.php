<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

interface IFilter
{
    public function apply(Builder $queryBuilder);
}
