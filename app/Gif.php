<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    public function video()
    {
        # Gif Belongs To Video
        # Defines An Inverse One-To-One Relationship
        return $this->belongsTo('App\Video');
    }
}
