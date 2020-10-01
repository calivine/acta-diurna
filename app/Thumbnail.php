<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    public function file()
    {
        # Thumbnail Belongs To File
        # Defines An Inverse One-To-One Relationship
        return $this->belongsTo('App\File');
    }
}
