<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Legend;
use App\Models\RatingLegend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSetRatingLegendController extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $request->validate([
            "rating" => "required|integer",
            "user_id" => "required|integer",
            //auth()->user()->id
        ]);

        try {
            DB::beginTransaction();
            RatingLegend::create([
                "rating" => $request['rating'],
                "legend_id" => $legend->id,
                "user_id" => $request['user_id']
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
