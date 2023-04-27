<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\GetLoginUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{   //todo remember logged user!
    function __invoke(Request $request)
    {
        $user = (new GetLoginUser)->login(
            [
                "email" => $request->email,
                "password" => $request->password
            ]
        );
        if (isset($user)) {
            auth()->login($user);
            return Response::json(["message" => "logged!", "error" => ""]);
        }
        return Response::json(["error" => "incorrect password or email!"]);
    }
}
