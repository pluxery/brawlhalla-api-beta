<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\User;

class GetSubscribers extends Controller
{
    function __invoke(User $user)
    {
        return $user->subscribers;
    }
}
