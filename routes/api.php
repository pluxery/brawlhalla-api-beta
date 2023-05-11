<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GetUserSubscribersController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostControllers\UserToggleLikePost;
use App\Http\Controllers\PostControllers\AddCommentToPostController;
use App\Http\Controllers\ResourceControllers\CategoryController;
use App\Http\Controllers\ResourceControllers\CommentController;
use App\Http\Controllers\ResourceControllers\LegendController;
use App\Http\Controllers\ResourceControllers\PostController;
use App\Http\Controllers\ResourceControllers\ReportController;
use App\Http\Controllers\ResourceControllers\TagController;
use App\Http\Controllers\ResourceControllers\WeaponController;
use App\Http\Controllers\LegendControllers\UserSetRatingLegendController;
use App\Http\Controllers\LegendControllers\UserToggleFavoriteLegend;
use App\Http\Controllers\ResourceControllers\UserController;
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
    Route::patch('/users/{user}', 'update');
});

Route::get('/users/{user}/subscriptions', [SubscriptionController::class, 'index']);
Route::get('/users/{user}/subscribers', GetUserSubscribersController::class);
Route::get('/subscriptions/{subscription}/add', [SubscriptionController::class, 'store']);
Route::delete('/subscriptions/{subscription}/delete', [SubscriptionController::class, 'destroy']);


Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{post}', 'show');
    Route::post('/posts', 'store');
    Route::patch('/posts/{post}', 'update');
    Route::delete('/posts/{post}', 'destroy');

});
Route::post('/posts/{post}/like', UserToggleLikePost::class);
Route::post('/posts/{post}/comment', AddCommentToPostController::class);

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
Route::get('/legends/{legend}/toggle_favorite', UserToggleFavoriteLegend::class);
Route::post("/legends/{legend}/update_rating", UserSetRatingLegendController::class);

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



