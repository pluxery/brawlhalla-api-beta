<?php


use App\Http\Controllers\LegendController;
use Illuminate\Support\Facades\Route;


Route::controller(LegendController::class)->group(function () {
    Route::get('/legends', 'index')->name('legends.index');
    Route::get('/legends/{legend}', 'show')->name('legends.show');
    Route::post('/legends', 'store')->name('legends.store');
    Route::delete('/legends/{legend}', 'destroy')->name('legends.delete');
});
