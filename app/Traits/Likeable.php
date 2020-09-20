<?php

namespace App\Traits;

use App\Models\Like;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLiked()
    {
        return (bool) $this->likes()->where('user_id', auth()->id())->first() ? true : false;
    }
}
