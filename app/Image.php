<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $fillable = ['filename', 'caption', 'position'];

    public function podcast(): BelongsTo
    {
        # Image belongs to Podcast
        # Defines An Inverse One-To-Many Relationship
        return $this->belongsTo('App\Podcast');
    }
}
