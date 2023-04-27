<?php


use App\Http\Controllers\ResourceControllers\WeaponController;
use Illuminate\Support\Facades\Route;


Route::controller(WeaponController::class)->group(function () {
    Route::get('/weapons', 'index')->name('weapons.index');
    Route::post('/weapons', 'store')->name('weapons.store');
    Route::post('/weapons/{weapon}', 'show')->name('weapons.show');
    Route::delete('/weapons/{weapon}', 'destroy')->name('weapons.delete');
});
