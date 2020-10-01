<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    public function file()
    {
        # Gif Belongs To File
        # Defines An Inverse One-To-One Relationship
        return $this->belongsTo('App\File');
    }
}
