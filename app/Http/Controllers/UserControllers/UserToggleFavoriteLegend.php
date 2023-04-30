<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Legend;
use App\Models\User;
use Illuminate\Http\Request;

class UserToggleFavoriteLegend extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $request->validate([
            "legend_id" => "required|integer",
            "user_id" => "required|integer",
        ]);

        $legend = Legend::find($request->legend_id);
        $user = User::find($request->user_id);
        $user->favoriteLegends()->toggle($legend->id);
        return $user->favoriteLegends;

    }
}
