<?php

// Fetch Data
// $likes = Post::find(10)->likes; //Gets post and likes
// $likes = Post::find(10)->likes()->orderBy(...)->get(); // use like a method and chain

// Insert Data
// $post = Post::find(10);
// $like = new Like();
// $post->likes()->save($like);

namespace App;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post() {
    	return $this->belongsTo('App\Post');
    }
}
