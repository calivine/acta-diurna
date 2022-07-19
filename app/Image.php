<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['filename', 'caption'];

    public function podcast()
    {
        # Image belongs to Podcast
        # Defines An Inverse One-To-Many Relationship
        return $this->belongsTo('App\Podcast');
    }
}
