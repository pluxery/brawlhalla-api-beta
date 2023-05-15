<?php

namespace App\Models;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
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
use Illuminate\Http\Resources\Json\JsonResource;

class TEST extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // 'description' => $this->description,
            // //'author' => new UserResource($this->user_id),
            // 'content' => $this->content,
            // 'likes' => $this->likes,
            // //'category' => new CategoryResource($this->category_id),
            // //'tags' => TagResource::collection($this->tags),
            // 'created_at' => date(' D M, Y', strtotime($this->created_at)),
            // 'updated_at' => date(' D M, Y', strtotime($this->updated_at)),
            // //'comments' => CommentResource::collection($this->comments)
        ];
    }
}

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

    function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'user_post_likes', 'user_id', 'post_id')
            ;//->select('post_id');

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
