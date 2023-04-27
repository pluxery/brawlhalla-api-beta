<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Requests\Stat\StoreStatRequest;
use App\Http\Requests\Stat\UpdateStatRequest;
use App\Models\Stat;

class StatController extends Controller
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
     * @param  \App\Http\Requests\Stat\StoreStatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function show(Stat $stat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function edit(Stat $stat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Stat\UpdateStatRequest  $request
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatRequest $request, Stat $stat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stat $stat)
    {
        //
    }
}
