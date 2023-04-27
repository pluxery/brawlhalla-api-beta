<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

    Route::post("/login", LoginController::class);//todo make middleware!
    Route::post("/register", RegisterController::class);//todo make middleware!


    require 'api/post.php';
    require 'api/comments.php';
    require 'api/reports.php';
    require 'api/categories.php';
    require 'api/tags.php';
    require 'api/legends.php';
    require 'api/weapons.php';
});
