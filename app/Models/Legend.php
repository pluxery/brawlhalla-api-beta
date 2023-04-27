<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Legend extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = false;

    function stats(): BelongsTo
    {
        return $this->belongsTo(Stat::class, 'stats_id', 'id');
    }

    function first_weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class, 'first_weapon_id', 'id');
    }

    function second_weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class, 'second_weapon_id', 'id');
    }

    function updateRating(): void
    {
        $table = $this->hasMany(RatingLegend::class);
        $this->rating = $table->sum('rating') / $table->count();
        $this->setAttribute("rating", $table->sum('rating') / $table->count());
    }
}
