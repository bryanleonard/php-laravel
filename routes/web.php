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


// Route::get('/', 'PostController@getIndex')->name('blog.index');
// A better way to say the above
Route::get('/', [
	'uses' => 'PostController@getIndex',
	'as' => 'blog.index'
]);

Route::get('/post/{id}', [
	'uses' => 'PostController@getPost',
	'as' => 'blog.post'
]);

Route::get('/post/{id}/like', [
	'uses' => 'PostController@getLikePost',
	'as' => 'blog.post.like'
]);

Route::get('about', function() {
	return view('misc.about');
})->name('misc.about');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {

	Route::get('', [
		'uses' => 'PostController@getAdminIndex',
		'as' => 'admin.index'
		// ,'middleware' => 'auth'
	]);

	Route::get('create', [
		'uses' => 'PostController@getAdminCreate',
		'as' => 'admin.create'
	]);

	Route::post('create', [
		'uses' => 'PostController@postAdminCreate',
		'as' => 'admin.create'
	]);

	Route::get('edit/{id}', [
		'uses' => 'PostController@getAdminEdit',
		'as' => 'admin.edit'
	]);

	Route::get('delete/{id}', [
		'uses' => 'PostController@getAdminDelete',
		'as' => 'admin.delete'
	]);

	Route::post('edit', [
		'uses' => 'PostController@postAdminUpdate',
		'as' => 'admin.update'
	]);

});

Auth::routes(); // login, out, and register

// Custom route overrides should follow out of the box ones in order to be used
Route::post('login', [
	'uses' => 'SigninController@signin',
	'as' => 'auth.signin'
]);
