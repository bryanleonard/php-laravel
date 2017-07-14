<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function getIndex()
	{
		// $posts = Post::all();
		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('blog.index', ['posts' => $posts]);
	}

	public function getAdminIndex() 
	{
		// $posts = Post::all();
		$posts = Post::orderBy('title', 'asc')->get();
		return view('admin.index', ['posts' => $posts]);
	}

	public function getPost($id)
	{
		// $post = Post::find($id); //convenience method, works just like below
		// $post = Post::where('id', '=', $id)->first(); // '=' is assumed when left off
		// $post = Post::where('id', $id)->first(); // if all we wanted was the post itself (lazy load likes on blade)
		$post = Post::where('id', $id)->with('likes')->first(); // load post and likes, eager loading
		return view('blog.post', ['post' => $post]);
	}

	public function getLikePost($id)
	{
		$post = Post::where('id', $id)->first();
		$like = new Like();
		$post->likes()->save($like);
		return redirect()->back();
	}

	public function getAdminCreate()
	{
		$tags = Tag::all();
		return view('admin.create', ['tags' => $tags]);
	}

	public function getAdminEdit($id)
	{
		$post = Post::find($id);
		$tags = Tag::all();
		return view('admin.edit', ['post' => $post, 'postId' => $id, 'tags' => $tags]);
	}

	public function postAdminCreate(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|min:5',
			'content' => 'required|min:10'
		]);

		$post = new Post([
			'title' => $request->input('title'),
			'content' => $request->input('content')
		]);
		$post->save();
		$post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
		
		// return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title'));
		return redirect()->route('admin.index')->with('info', 'The post has been created.');
	}

	public function postAdminUpdate(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|min:5',
			'content' => 'required|min:10'
		]);
		$post = Post::find($request->input('id'));
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->save();
		// remove all tags first then attach the updated tags
		//$post->tags()->detach(); 
		//$post->tags()->attach($request->input('tags')) === null ? [] : $request->input('tags'));
		//or sync, which is more efficient
		$post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));
		return redirect()->route('admin.index')->with('info', 'The post has been updated.');
		// return redirect()->route('admin.index')->with('info', 'Post edited, title is: ' . $request->input('title'));
	}

	public function getAdminDelete($id)
	{
		$post = Post::find($id);
		$post->likes()->delete();
		$post->tags()->detach();
		$post->delete();
		return redirect()->route('admin.index')->with('info', 'Post deleted.');
	}
}
