<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    public function podcast()
    {
        # Image belongs to Podcast
        # Defines An Inverse One-To-Many Relationship
        return $this->belongsTo('App\Podcast');
    }
}
