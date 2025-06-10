<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function getTwitterFormattedAttribute()
    {
        $created = Carbon::parse($this->created_at);

        return $created->format('g:i A · M j, Y');
    }
}
