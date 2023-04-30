<?php

namespace App\Http\Controllers;

use App\Models\Legend;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFavoriteLegend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
