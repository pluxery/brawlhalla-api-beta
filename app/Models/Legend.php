<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use mysql_xdevapi\Collection;

class Legend extends Model
{
    use HasFactory;

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
}
