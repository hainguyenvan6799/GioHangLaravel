<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Session;
use URL;
use Redirect;


class UserController extends Controller
{
    //
    public function getSignup(){
    	return view('users.signup');
    }
    public function postSignup(Request $request)
    {
    	$this->validate($request, [
    		'name'=>'required',
    		'email'=>'required|unique:users',
    		'password'=>'required|min:4'
    	],
    	[
    		'name.required'=>'Name can not empty',
    		'email.required'=>'Email can not empty',
    		'email.unique'=>'Email existed',
    		'password.required'=>'Password can not empty',
    		'password.min'=>'Password is not lower 4 characters'
    	]
    );
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	return redirect('signup')->with('announce', 'Sign up successfully');
    }
    public function getLogin(){
        Session::put('oldUrl',URL::previous());
    	return view('users.login');
    }
    public function postLogin(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;
    	if(Auth::attempt(['email'=>$email, 'password'=>$password]))
    	{
            if(Session::has('oldUrl'))
            {
                $oldUrl = Session::get('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect('LaravelShop');
    		
    	}
    	else
    	{
    		return redirect('login');
    	}
    }

    public function checkAuth(){
    	if(Auth::check())
    	{
    		echo Auth::user()->name;
    	}
    }

    public function logout(){
    	if(Auth::check())
    	{
    		Auth::logout();
    	}
    	return redirect()->back();
    }

    public function getProfile(){
    	if(Auth::check()){
    		return view('users.profile');
    	}
    	
    }
}
