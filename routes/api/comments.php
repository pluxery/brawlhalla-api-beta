<?php


use App\Http\Controllers\ResourceControllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::controller(CommentController::class)->group(function () {
    Route::get('/comments', 'index')->name('comments.index');
    Route::get('/comments/{comment}', 'show')->name('comments.show');
    Route::post('/comments', 'store')->name('comments.store');
    Route::delete('/comments/{comment}', 'destroy')->name('comments.delete');
});
