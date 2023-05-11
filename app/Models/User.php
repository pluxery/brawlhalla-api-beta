<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    protected $guarded = false;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    function likedPosts(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_post_likes', 'user_id', 'post_id');
    }

    function favoriteLegends(): BelongsToMany
    {
        return $this->belongsToMany(Legend::class, 'user_favorite_legends', 'user_id', 'legend_id');
    }

    function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'user_id', 'subscription_id')
            ->select(['subscription_id', 'name', 'avatar', 'elo']);
    }

    function subscribers()
    {
        return $this->hasMany(Subscription::class, 'subscription_id', 'id');

    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
