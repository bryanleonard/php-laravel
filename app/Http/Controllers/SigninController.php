<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth; //important

class SigninController extends Controller
{
    //Creating a custom login
    public function signin(Request $request)
    {
        //dd('our own stuff' . $request);
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	// Note: password is a semi-protected variable and remember me is pre-installed with Auth.
    	// Little bit of black box voodoo
        // $request->has('remember') is optional if you want that functionality
    	if (Auth::attempt([
	    		'email' => $request->input('email'),
	    		'password' => $request->input('password')
    		], $request->has('remember')))
    	{
    		// return redirect('/admin')
    		// or
    		return redirect()->route('admin.index');
    	}

    	return redirect()->back()->with('fail', 'Authentication failed. Try again.');
    }
}
