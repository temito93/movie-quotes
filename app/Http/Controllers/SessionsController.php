<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUserRequest;
use Illuminate\Support\Facades\Config;

class SessionsController extends Controller
{
	//Login User
	public function authenticate(ValidateUserRequest $request)
	{
		$attributes = $request->validated();

		if (auth()->attempt($attributes))
		{
			request()->session()->regenerate();

			return redirect()->route('dashboard', ['locale' => Config::get('app.locale')]);
		}

		return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('input');
	}

	//Logout
	public function destroy()
	{
		auth()->logout();

		return redirect()->route('homepage', ['locale' => Config::get('app.locale')]);
	}
}
