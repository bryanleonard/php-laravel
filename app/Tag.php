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
    	// return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_id')->withTimestamps(); // make sure timestamps get filled out
    	return $this->belongsToMany('App\Post')->withTimestamps();
    }
}

// Fetch Data
// $tags = Post::find(10)->tags; // still don't know what the 10 means
// $tags = Post::find(10)->tags()->orderby(...)->get();

// Insert Data
// $post = Post::find(10);
// $tagid = 1; // or a variable
// $post->tags()->attach($tagId);

//Delete
// $post->tags()->detach($tagId);