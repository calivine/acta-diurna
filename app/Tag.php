<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public function videos()
    {
        # Tag has many videos
        # Define a many-to-many relationship
        return $this->belongsToMany('App\Video');
    }

    public function importance()
    {
        $total_views = 0;
        foreach($this->videos as $video) {
            $total_views += $video->views;
        }
        return $this->videos->count() * $total_views;
    }

    public function weight()
    {
        return $this->importance() * .01 + 1;
    }
    
}
