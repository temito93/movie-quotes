<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUserRequest;

class SessionsController extends Controller
{
	//Login Form
	public function create()
	{
		return view('sessions.create');
	}

	//Login User
	public function authenticate(ValidateUserRequest $request)
	{
		$attributes = $request->validated();

		if (auth()->attempt($attributes))
		{
			request()->session()->regenerate();

			return redirect('/admin/main/en');
		}

		return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('input');
	}

	//Logout
	public function destroy()
	{
		auth()->logout();

		return redirect('/login');
	}
}
