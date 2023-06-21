<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class LegendFilter extends AbstractFilter
{

    protected function getCallbacks(): array
    {
        return [
            'name' => [$this, 'name'],
            'weapons_or' => [$this, 'weaponsAny'],
            'weapons_and' => [$this, 'weaponsAll'],
        ];
    }

    function name(Builder $queryBuilder, $value): Builder
    {
        return $queryBuilder->where('name', 'like', "%$value%");

    }

    function weaponsAny(Builder $queryBuilder, array $values): Builder
    {
        return $queryBuilder->whereIn("first_weapon_id", $values)
            ->orWhereIn("second_weapon_id", $values);

    }

    function weaponsAll(Builder $queryBuilder, array $values): Builder
    {
    
        return $queryBuilder->whereIn("first_weapon_id", $values)
            ->whereIn("second_weapon_id", $values);

    }
}
