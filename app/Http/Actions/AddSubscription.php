<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;

class AddSubscription extends Controller
{
    function __invoke(User $subscription)
    {
        $user = auth()->user();
        Subscription::create([
            'user_id' => $user->id,
            'subscription_id' => $subscription->id
        ]);
        return $user->subscriptions;
    }
}
