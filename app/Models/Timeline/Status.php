<?php

namespace App\Models\Timeline;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Likeable;

class Status extends Model
{
    use Likeable;
    protected $fillable = ['hash', 'body'];
    protected $withCount = ['comments'];

    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
