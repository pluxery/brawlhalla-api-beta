<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\User;

class GetFavoriteLegends extends Controller
{
    function __invoke(User $user){
        return $user->favoriteLegends;
    }
}
