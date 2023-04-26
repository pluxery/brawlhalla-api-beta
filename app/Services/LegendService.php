<?php

namespace App\Services;

use App\Http\Filters\LegendFilter;
use App\Models\Legend;

class LegendService
{
    function index($data){
        $filter = app()->make(LegendFilter::class,  ['queryParams' => array_filter($data)]);
        return Legend::filter($filter)->get()->all();

    }
    function store($data){

    }

    function update($data, Legend $legend){

    }

}
