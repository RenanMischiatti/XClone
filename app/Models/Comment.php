<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_comment_id',
        'content',
    ];

    /**
     * The comment belongs to a post.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * The comment belongs to a user (author).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The comment may belong to a parent comment (reply).
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    /**
     * The comment may have multiple child comments (replies).
     */
    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    /**
     * Recursively load child comments for nested threads.
     */
    public function childrenRecursive(): HasMany
    {
        return $this->children()->with('childrenRecursive');
    }

    public function getTimeAgoAttribute()
    {
        $created = Carbon::parse($this->created_at);
        $now = Carbon::now();

        $diffInSeconds = $created->diffInSeconds($now);
        $diffInMinutes = round($created->diffInMinutes($now));
        $diffInHours = round($created->diffInHours($now));
        $diffInDays = round($created->diffInDays($now));

        if ($diffInSeconds < 60) {
            return 'Just now';
        }

        if ($diffInMinutes < 60) {
            return "$diffInMinutes minute" . ($diffInMinutes > 1 ? 's' : '') . " ago";
        }

        if ($diffInHours < 24) {
            return "$diffInHours hour" . ($diffInHours > 1 ? 's' : '') . " ago";
        }

        if ($diffInDays <= 3) {
            return "$diffInDays day" . ($diffInDays > 1 ? 's' : '') . " ago";
        }

        return $created->format('d/m/Y');
    }
}
