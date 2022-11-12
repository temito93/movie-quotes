<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
	//Show Admin Dashboard
	public function show($lang)
	{
		App::setLocale($lang);
		return view('admin.index', [
			'movies' => Movies::latest()->get(),
		]);
	}
}
