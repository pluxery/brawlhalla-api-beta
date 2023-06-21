<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Legend;
use App\Models\RatingLegend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetRatingLegend extends Controller
{
    function __invoke(Legend $legend, Request $request)
    {
        $request->validate([
            "rating" => "required|integer",
        ]);
        try {
            RatingLegend::create([
                "rating" => $request['rating'],
                "legend_id" => $legend->id,
                "user_id" => auth()->user()->id
            ]);
        } catch (\Exception $exception) { 
            return $exception->getMessage();
        }
        return $legend->rating;
    }
}
