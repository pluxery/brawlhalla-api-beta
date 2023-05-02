<?php


use App\Http\Controllers\ResourceControllers\LegendController;
use App\Http\Controllers\LegendControllers\UserSetRatingLegendController;
use App\Http\Controllers\LegendControllers\UserToggleFavoriteLegend;
use Illuminate\Support\Facades\Route;


Route::controller(LegendController::class)->group(function () {
    Route::get('/legends', 'index')->name('legends.index');
    Route::get('/legends/{legend}', 'show')->name('legends.show');
    Route::patch('/legends/{legend}', 'update')->name('legends.update');
    Route::post('/legends', 'store')->name('legends.store');
    Route::delete('/legends/{legend}', 'destroy')->name('legends.delete');
});
Route::post('/legends/{legend}/toggle_favorite', UserToggleFavoriteLegend::class);
Route::post("/legends/{legend}/update_rating", UserSetRatingLegendController::class);
