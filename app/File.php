<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function thumbnail()
    {
        # File Has Thumbnail
        # Defines A One-To-One Relationship
        return $this->hasOne('App\Thumbnail');
    }

    public function user()
    {
        # Activity Belongs To User
        # Defines An Inverse One-To-Many Relationship
        return $this->belongsTo('App\User');
    }

    public function gif()
    {
        # File Has Thumbnail
        # Defines A One-To-One Relationship
        return $this->hasOne('App\Gif');
    }

    public function tags()
    {
        # File has many tags
        # Define a many-to-many relationship
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
