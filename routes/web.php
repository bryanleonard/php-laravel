<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	return view('blog.index');
// })->name('blog.index');


Route::get('/', 'PostController@getIndex')->name('blog.index');

Route::get('post/{id}', function($id) {

	if ($id == 1) {
		$post = [
			'title' => 'Learning Laravel',
			'content' => 'This blog post will get you on the right track with Laravel!'
		];
	} 
	else {
		$post = [
			'title' => 'This is some other post title',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit delectus sit odio nesciunt, aut cumque omnis deleniti cum inventore natus commodi culpa laborum dolores quo earum illo impedit maiores. Quia.'
		];
	}
	return view('blog.post', ['post' => $post]);

})->name('blog.post');

Route::get('about', function() {
	return view('misc.about');
})->name('misc.about');

Route::group(['prefix' => 'admin'], function() {

	Route::get('', function () {
		return view('admin.index');
	})->name('admin.index');

	Route::get('create', function () {
		return view('admin.create');
	})->name('admin.create');

	Route::post('create', function(\Illuminate\Http\Request $request, \Illuminate\Validation\Factory $validator) {
		$validation = $validator->make($request->all(), [
			'title' => 'required|min:5',
			'content' => 'required|min:10'
		]);
		if ($validation->fails()) {
			return redirect()->back()->withErrors($validation);
		}
		return redirect()
			->route('admin.index')
			->with('info', 'Post created, Title: ' . $request->input('title'));
	})->name('admin.create');

	Route::post('create', function(\Illuminate\Http\Request $request, \Illuminate\Validation\Factory $validator) {
		$validation = $validator->make($request->all(), [
			'title' => 'required|min:5',
			'content' => 'required|min:10'
		]);
		if ($validation->fails()) {
			return redirect()->back()->withErrors($validation);
		}
		return redirect()
			->route('admin.index')
			->with('info', 'Post created, Title: ' . $request->input('title'));
	})->name('admin.create');

	Route::get('edit/{id}', function($id) {
		if ($id == 1) {
			$post = [
				'title' => 'Learning Laravel',
				'content' => 'This blog post will get you on the right track with Laravel!'
			];
		} else {
			$post = [
				'title' => 'This is some other post title',
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit delectus sit odio nesciunt, aut cumque omnis deleniti cum inventore natus commodi culpa laborum dolores quo earum illo impedit maiores. Quia.'
			];
		}
		return view('admin.edit', ['post' => $post]);
	})->name('admin.edit');

	// notice the different ->name.
	Route::post('edit', function(\Illuminate\Http\Request $request, \Illuminate\Validation\Factory $validator) {
		// return "It works!";
		$validation = $validator -> make($request->all(), [
				'title' => 'required|min:5',
				'content' => 'required|min:10'
			]);

		if ($valdiation->fails()) {
			return redirect()->back()->withErrors($validation);
		}


		return redirect() 
			-> route('admin.index') 
			-> with('info', 'Post edited, new Title: ' . $request->input('title'));
	})->name('admin.update');
});