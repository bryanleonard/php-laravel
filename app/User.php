<?php

namespace App;

// use App\Notifications\CustomPasswordReset;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable; //required for any model that might receive notifications

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	// If we wanted to override the fn in 'namespace Illuminate\Foundation\Auth;' under laravel/framework/src/Illuminate...'
	// public function sendPasswordResetNotification($token)
	// {
	//     $this->notify(new CustomPasswordReset($token));
	// }
}
