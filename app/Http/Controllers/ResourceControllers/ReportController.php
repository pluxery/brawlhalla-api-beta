<?php

namespace App\Http\Controllers\ResourceControllers;

use App\Http\Requests\Report\StoreRequest;
use App\Http\Resources\ReportResource;
use App\Models\Report;

class ReportController extends Controller
{

    function index()
    {
        return ReportResource::collection(Report::all());
    }

    function store(StoreRequest $request)
    {
        $data = $request->validated();
        $report = Report::create($data);
        return new ReportResource($report);

    }

    function show(Report $report)
    {

        return new ReportResource($report);
    }

    function update()
    {

    }

    function destroy(Report $report)
    {
        return $report->delete();

    }

}
