<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group([], function () {

        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');
    });

    Route::group([], function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');
    });

    Route::group([], function () {
        Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
        Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
        Route::post('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

        //todo cascade delete
        Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.delete');
    });
});
