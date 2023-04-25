<?php


use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::controller(ReportController::class)->group(function () {
    Route::get('/reports', 'index')->name('reports.index');
    Route::get('/reports/{report}', 'show')->name('reports.show');
    Route::post('/reports', 'store')->name('reports.store');
    Route::delete('/reports/{report}', 'destroy')->name('reports.delete');
});
