<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Weapon extends Model
{
    use HasFactory;

    protected $guarded = false;

    function legends()
    {
        return $this->hasMany(Legend::class, 'first_weapon_id', 'id');
    }
}
