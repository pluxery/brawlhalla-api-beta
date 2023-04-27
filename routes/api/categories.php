<?php

use App\Http\Controllers\ResourceControllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::post('/categories', 'store')->name('categories.store');
    Route::post('/categories/{category}', 'show')->name('categories.show');
    Route::delete('/categories/{category}', 'destroy')->name('categories.delete');
});
