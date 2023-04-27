<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Fortify\Fortify;

class RegisterController extends Controller
{
    function __invoke(Request $request)
    {
        $user = (new CreateNewUser)->create(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
            ]
        );
        auth()->login($user);
        return Response::json(["message" => "logged!", "error" => ""]);
    }
}