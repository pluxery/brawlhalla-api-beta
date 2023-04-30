<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserToggleFavoriteLegend;
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

//auth
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    //private
    Route::group(['middleware' => 'auth:api'], function () {

    });

});

//public
Route::group([], function () {
    //todo give legend in controller (and post router make)
    Route::post('legends/favorite', UserToggleFavoriteLegend::class);
    require 'api/posts.php';
    require 'api/tags.php';
    require 'api/categories.php';
    require 'api/legends.php';
    require 'api/weapons.php';
    require 'api/comments.php';
    require 'api/reports.php';
});
