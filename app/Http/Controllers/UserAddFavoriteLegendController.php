<?php

namespace App\Http\Controllers;

use App\Models\Legend;
use App\Models\RatingLegend;
use App\Models\UserFavoriteLegend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ResourceControllers\Controller;

class UserAddFavoriteLegendController extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $request->validate([
            "legend_id" => "required|integer",
            "user_id" => "required|integer",
            //auth()->user()->id
        ]);

        try {
            DB::beginTransaction();
            UserFavoriteLegend::create([
                "legend_id" => $request['legend_id'],
                "user_id" => $request['user_id']
            ]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $legend->rating;
    }
}
