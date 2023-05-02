<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostControllers\UserToggleLikePost;
use App\Http\Controllers\ResourceControllers\CategoryController;
use App\Http\Controllers\ResourceControllers\CommentController;
use App\Http\Controllers\ResourceControllers\LegendController;
use App\Http\Controllers\ResourceControllers\PostController;
use App\Http\Controllers\ResourceControllers\ReportController;
use App\Http\Controllers\ResourceControllers\TagController;
use App\Http\Controllers\ResourceControllers\WeaponController;
use App\Http\Controllers\LegendControllers\UserSetRatingLegendController;
use App\Http\Controllers\LegendControllers\UserToggleFavoriteLegend;
use Illuminate\Support\Facades\Route;

//auth
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('api.refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('api.me');
    //private
    Route::group(['middleware' => 'auth:api'], function () {

    });
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::post('/posts', 'store')->name('posts.store');
    Route::patch('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.delete');

});
Route::post('/posts/{post}/like', UserToggleLikePost::class)->name('posts.like');

Route::controller(LegendController::class)->group(function () {
    Route::get('/legends', 'index')->name('legends.index');
    Route::get('/legends/{legend}', 'show')->name('legends.show');
    Route::patch('/legends/{legend}', 'update')->name('legends.update');
    Route::post('/legends', 'store')->name('legends.store');
    Route::delete('/legends/{legend}', 'destroy')->name('legends.delete');
});
Route::post('/legends/{legend}/toggle_favorite', UserToggleFavoriteLegend::class);
Route::post("/legends/{legend}/update_rating", UserSetRatingLegendController::class);

Route::controller(WeaponController::class)->group(function () {
    Route::get('/weapons', 'index')->name('weapons.index');
    Route::post('/weapons', 'store')->name('weapons.store');
    Route::post('/weapons/{weapon}', 'show')->name('weapons.show');
    Route::delete('/weapons/{weapon}', 'destroy')->name('weapons.delete');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::post('/categories', 'store')->name('categories.store');
    Route::post('/categories/{category}', 'show')->name('categories.show');
    Route::patch('/categories/{category}', 'update')->name('categories.update');
    Route::delete('/categories/{category}', 'destroy')->name('categories.delete');
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


Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name('tags.index');
    Route::post('/tags', 'store')->name('tags.store');
    Route::post('/tags/{tag}', 'show')->name('tags.show');
    //todo delete fix
    Route::delete('/tags/{tag}', 'destroy')->name('tags.delete');
});



