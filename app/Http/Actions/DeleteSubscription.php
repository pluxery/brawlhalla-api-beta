<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;

class DeleteSubscription extends Controller
{
    function __invoke(User $subscription)
    {
        $user = auth()->user();
        Subscription::where('user_id', '=', auth()->user()->id)->where('subscription_id', '=', $subscription->id)->delete();
        return $user->subscriptions;
    }

}
