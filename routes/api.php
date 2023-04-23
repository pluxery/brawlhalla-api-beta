<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
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

Route::group([], function () {
    Route::controller(PostController::class)->group(function () {

        Route::get('/posts', 'index')->name('posts.index');
        Route::get('/posts/{post}', 'show')->name('posts.show');
        Route::post('/posts', 'store')->name('posts.store');
        Route::patch('/posts/{post}', 'update')->name('posts.update');
        Route::delete('/posts/{post}', 'destroy')->name('posts.delete');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::get('/comments', 'index')->name('comments.index');
        Route::get('/comments/{comment}', 'show')->name('comments.show');
        Route::post('/comments', 'store')->name('comments.store');
        Route::delete('/comments/{comment}', 'destroy')->name('comments.delete');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/reports', 'index')->name('reports.index');
        Route::get('/reports/{report}', 'show')->name('reports.show');
        Route::post('/reports', 'store')->name('reports.store');
        Route::delete('/reports/{report}', 'destroy')->name('reports.delete');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::post('/categories', 'store')->name('categories.store');
        Route::post('/categories/{category}', 'show')->name('categories.show');
        Route::delete('/categories/{category}', 'destroy')->name('categories.delete');
    });

    Route::controller(TagController::class)->group(function () {
        Route::get('/tags', 'index')->name('tags.index');
        Route::post('/tags', 'store')->name('tags.store');
        Route::post('/tags/{tag}', 'show')->name('tags.show');
        //todo cascade delete
        Route::delete('/tags/{tag}', 'destroy')->name('tags.delete');
    });
});
