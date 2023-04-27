<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ResourceControllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    function __invoke(Request $request)
    {
        auth()->logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        return true;
    }

}
