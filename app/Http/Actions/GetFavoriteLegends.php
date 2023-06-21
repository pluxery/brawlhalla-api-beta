<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\LegendResource;

class GetFavoriteLegends extends Controller
{
    function __invoke(User $user){
        return  LegendResource::collection($user->favoriteLegends);
    }
}
