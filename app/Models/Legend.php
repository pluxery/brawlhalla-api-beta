<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Legend extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = false;


    function first_weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class, 'first_weapon_id', 'id');
    }

    function second_weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class, 'second_weapon_id', 'id');
    }

    function rated_users():HasMany
    {
        $table = $this->hasMany(RatingLegend::class);
        return $table;
    }
}
