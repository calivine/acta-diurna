<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        # Activity Belongs To User
        # Defines An Inverse One-To-Many Relationship
        return $this->belongsTo('App\User');
    }
}
