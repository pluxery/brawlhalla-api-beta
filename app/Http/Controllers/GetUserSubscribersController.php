<?php

namespace App\Http\Controllers;

use App\Models\User;

class GetUserSubscribersController extends Controller
{
    function __invoke(User $user)
    {
        return $user->subscribers;
    }
}
