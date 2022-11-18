<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
	//Show Admin Dashboard
	public function show($locale, Quote $quote)
	{
		App::setLocale($locale);
		return view('admin.index', [
			'movies' => Movie::latest()->paginate(5),
            'quote' => $quote
		]);
	}
}
