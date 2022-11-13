<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
	//Show Admin Dashboard
	public function show($locale)
	{
		App::setLocale($locale);
		return view('admin.index', [
			'movies' => Movie::latest()->get(),
		]);
	}
}
