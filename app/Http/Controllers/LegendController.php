<?php

namespace App\Http\Controllers;

use App\Http\Requests\Legend\StoreRequest;
use App\Http\Requests\Legend\UpdateRequest;
use App\Http\Resources\LegendResource;
use App\Models\Legend;

class LegendController extends Controller
{

    public function index()
    {
        //todo FILTER
        return LegendResource::collection(Legend::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Legend\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Legend  $legend
     * @return \Illuminate\Http\Response
     */
    public function show(Legend $legend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Legend  $legend
     * @return \Illuminate\Http\Response
     */
    public function edit(Legend $legend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Legend\UpdateRequest  $request
     * @param  \App\Models\Legend  $legend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Legend $legend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Legend  $legend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Legend $legend)
    {
        //
    }
}
