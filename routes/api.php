<?php


use App\Http\Actions\AddComment;
use App\Http\Actions\AddSubscription;
use App\Http\Actions\DeleteSubscription;
use App\Http\Actions\GetFavoriteLegends;
use App\Http\Actions\GetLikedPosts;
use App\Http\Actions\GetSubscribers;
use App\Http\Actions\GetSubscriptions;
use App\Http\Actions\SetRatingLegend;
use App\Http\Actions\ToggleFavoriteLegend;
use App\Http\Actions\ToggleLikePost;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResourceControllers\CategoryController;
use App\Http\Controllers\ResourceControllers\CommentController;
use App\Http\Controllers\ResourceControllers\LegendController;
use App\Http\Controllers\ResourceControllers\PostController;
use App\Http\Controllers\ResourceControllers\ReportController;
use App\Http\Controllers\ResourceControllers\TagController;
use App\Http\Controllers\ResourceControllers\UserController;
use App\Http\Controllers\ResourceControllers\WeaponController;
use Illuminate\Support\Facades\Route;

//auth
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/{user}', 'show');
    Route::delete('/users/{user}', 'destroy');
    Route::get('/users/{id}/restore', 'restore');
    Route::get('/users/{user}', 'show');
    Route::post('/users/{user}', 'update');//instead patch because form-data request use only post method

});

Route::get('/users/{user}/subscriptions', GetSubscriptions::class);
Route::get('/subscriptions/{subscription}/add', AddSubscription::class);
Route::delete('/subscriptions/{subscription}/delete', DeleteSubscription::class);

Route::get('/users/{user}/subscribers', GetSubscribers::class);
Route::get('/users/{user}/liked_posts', GetLikedPosts::class);
Route::get('/users/{user}/favorite_legends', GetFavoriteLegends::class);

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{post}', 'show');
    Route::post('/posts', 'store');
    Route::post('/posts/{post}/edit', 'update');
    Route::delete('/posts/{post}', 'destroy');

});
Route::get('/posts/{post}/like', ToggleLikePost::class);
Route::post('/posts/{post}/comment', AddComment::class);

Route::controller(CommentController::class)->group(function () {
    Route::delete('/comments/{comment}', 'destroy');
});

Route::controller(LegendController::class)->group(function () {
    Route::get('/legends', 'index');
    Route::get('/legends/{legend}', 'show');
    Route::patch('/legends/{legend}', 'update');
    Route::post('/legends', 'store');
    Route::delete('/legends/{legend}', 'destroy');
});
Route::get('/legends/{legend}/toggle_favorite', ToggleFavoriteLegend::class);
Route::post("/legends/{legend}/update_rating", SetRatingLegend::class);

Route::controller(WeaponController::class)->group(function () {
    Route::get('/weapons', 'index');
    Route::post('/weapons', 'store');
    Route::get('/weapons/{weapon}', 'show');
    Route::delete('/weapons/{weapon}', 'destroy');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::post('/categories/{category}', 'show');
    Route::patch('/categories/{category}', 'update');
    Route::delete('/categories/{category}', 'destroy');
});

Route::controller(ReportController::class)->group(function () {
    Route::get('/reports', 'index');
    Route::get('/reports/{report}', 'show');
    Route::post('/reports', 'store');
    Route::delete('/reports/{report}', 'destroy');
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index');
    Route::post('/tags', 'store');
    Route::post('/tags/{tag}', 'show');
    Route::delete('/tags/{tag}', 'destroy');
});



