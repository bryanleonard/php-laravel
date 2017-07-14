<?php

//Basic fetching data (select) options
// $posts = Post::where('title', '=' 'Title')->get();
// $post = Post::where('title', '=', 'Title')->first();
// $posts = Post::all();
// $post = Post:find(10); // get by ID shorthand


//Basic updating
// $post = Post::where('title', '=', 'Title')->first();
// $post->title = 'New Title';
// $post->save();

//multi update where criteria is met with multiple db records
// $post = Post::where('title', '=', 'Title')->update(['title' => 'New Title']);

// Deleting content (hard delete)
// Research soft deleting: htp://laravel.com/docs/5.3/eloquent#soft-deleting
// $post = Post::where('title', '=', 'Title')->first();
// $post->delete();
// multi delete
// $post = Post::where('title', '=', 'Title')->delete();

//Collections of models are returned
// http://laravel.com/docs/5.3/collections
// some methods:
// filter(), sort(), each(), ...();

// Query builder
// http://laravel.com/docs/5.3/queries

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'content'];


	public function likes()
	{
		// second arg in return is optional, default (her, post_id) is assumed
		return $this->hasMany('App\Like', 'post_id');
	}

	public function tags()
	{
		// second and third args in return are the default, leaving here for demo since that's how you'd override it
		return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id')->withTimestamps();
	}

}

