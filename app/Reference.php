<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reference extends Model
{
    protected $fillable = ['label', 'url'];

    public function podcast(): BelongsTo
    {
        # Image belongs to Podcast
        # Defines An Inverse One-To-Many Relationship
        return $this->belongsTo('App\Podcast');
    }
}
