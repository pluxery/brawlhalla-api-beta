<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\User;

class GetSubscriptions extends Controller
{
    function __invoke(User $user)
    {
        return $user->subscriptions;
    }
}
