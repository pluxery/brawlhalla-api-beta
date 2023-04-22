<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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
        Route::get('/posts', [PostController::class, 'index'])->name('post.index');
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
    });

    Route::group([], function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/category', [PostController::class, 'store'])->name('category.store');
    });

    Route::group([], function () {
        Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
        Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
    });
});
