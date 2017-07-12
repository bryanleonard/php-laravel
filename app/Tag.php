<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // protected $fillable = ['name'];
    public function posts()
    {
    	// can also pass 2nd - 4th args to override defaults for ex,
    	// return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_id');
    	// return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_id')->widthTimestamps(); // make sure timestamps get filled out
    	return $this->belongsToMany('App\Post');
    }
}
