<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = false;

    function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
    function likes(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_post_likes', 'post_id', 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function reports() {
        return $this->hasMany(Report::class);
    }


}
