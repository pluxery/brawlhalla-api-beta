<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Legend;
use App\Models\User;
use Illuminate\Http\Request;

class ToggleFavoriteLegend extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->favoriteLegends()->toggle($legend->id);
        return $user->favoriteLegends;

    }
}
