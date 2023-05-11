<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    function index(User $user)
    {
        return $user->subscriptions;
    }
    function store(User $subscription)
    {
        $user = auth()->user();
        Subscription::create([
            'user_id' => $user->id,
            'subscription_id' => $subscription->id
        ]);
        return $user->subscriptions;
    }

    function destroy(User $subscription)
    {
        $user = auth()->user();
        Subscription::where('user_id', '=', auth()->user()->id)->where('subscription_id', '=', $subscription->id)->delete();
        return $user->subscriptions;
    }
}
