<?php

namespace App\Http\Controllers;

use App\Models\Legend;
use App\Http\Requests\StoreLegendRequest;
use App\Http\Requests\UpdateLegendRequest;

class LegendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLegendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegendRequest $request)
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
     * @param  \App\Http\Requests\UpdateLegendRequest  $request
     * @param  \App\Models\Legend  $legend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLegendRequest $request, Legend $legend)
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
