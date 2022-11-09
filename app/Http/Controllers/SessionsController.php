<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	//Login Form
	public function create()
	{
		return view('sessions.create');
	}
}
