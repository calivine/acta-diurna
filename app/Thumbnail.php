<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    public function video()
    {
        # Thumbnail Belongs To Video
        # Defines An Inverse One-To-One Relationship
        return $this->belongsTo('App\Video');
    }
}
