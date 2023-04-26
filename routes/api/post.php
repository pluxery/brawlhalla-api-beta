<?php


use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::controller(PostController::class)->group(function () {

    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::post('/posts', 'store')->name('posts.store');
    Route::patch('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.delete');
});