<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Legend;
use App\Models\Post;
use App\Models\Report;
use App\Models\Subscription;
use App\Models\User;
use App\Policies\CommentPolicy;
use App\Policies\LegendPolicy;
use App\Policies\PostPolicy;
use App\Policies\ReportPolicy;
use App\Policies\SubscriptionPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        Legend::class => LegendPolicy::class,
        Comment::class => CommentPolicy::class,
        Report::class => ReportPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
