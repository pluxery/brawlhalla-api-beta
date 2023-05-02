<?php

namespace App\Http\Controllers\LegendControllers;

use App\Http\Controllers\Controller;
use App\Models\Legend;
use App\Models\User;
use Illuminate\Http\Request;

class UserToggleFavoriteLegend extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $request->validate([
            "user_id" => "required|integer",
        ]);

        $user = User::find($request->user_id);
        $user->favoriteLegends()->toggle($legend->id);
        return $user->favoriteLegends;

    }
}
