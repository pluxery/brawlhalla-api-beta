<?php

namespace App\Http\Controllers\ResourceControllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        //todo get legend model [returned UserFavoriteLegends model]
        $user = User::find(19);
        dd($user->favoriteLegends);
        return UserResource::collection($users);

    }
}
