<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name('tags.index');
    Route::post('/tags', 'store')->name('tags.store');
    Route::post('/tags/{tag}', 'show')->name('tags.show');
    //todo cascade delete
    Route::delete('/tags/{tag}', 'destroy')->name('tags.delete');
});