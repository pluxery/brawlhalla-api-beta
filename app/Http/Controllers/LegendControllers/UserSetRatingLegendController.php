<?php

namespace App\Http\Controllers\LegendControllers;

use App\Http\Controllers\Controller;
use App\Models\Legend;
use App\Models\RatingLegend;
use App\Policies\LegendPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSetRatingLegendController extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $request->validate([
            "rating" => "required|integer",
        ]);
        try {
            DB::beginTransaction();
            RatingLegend::create([
                "rating" => $request['rating'],
                "legend_id" => $legend->id,
                "user_id" => auth()->user()->id
            ]);
            $legend->updateRating();
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $legend->rating;
    }
}
