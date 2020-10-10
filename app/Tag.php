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
        return $this->belongsToMany('App\Video');
    }

    public function importance()
    {
        return $this->videos->count();
    }

    public function weight()
    {
        return $this->importance() * .01 + 1;
    }
    
}
