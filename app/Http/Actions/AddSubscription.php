<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;

class AddSubscription extends Controller
{
    function __invoke(User $subscription)
    {
        Subscription::create([
            'user_id' => auth()->user()->id,
            'subscription_id' => $subscription->id
        ]);
        return auth()->user()->subscriptions;
    }

}
