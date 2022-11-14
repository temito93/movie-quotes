<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\App;
use App\Http\Requests\MovieValidateRequest;
use App\Models\Quote;
use Illuminate\Support\Facades\Config;

class MoviesController extends Controller
{
	//Show All Movies
	public function show($locale)
	{
		App::setLocale($locale);
		return view('main.index', [
			'movies'  => Movie::latest()->get(),
			'quote'   => Quote::all()->random(1),
		]);
	}

	//Show Movie Upload Form
	public function index($locale)
	{
		App::setLocale($locale);
		return view('admin.movies.create', [
			'movies' => Movie::latest()->get(),
		]);
	}

	//Upload Movie
	public function store($locale, MovieValidateRequest $request)
	{
		App::setLocale($locale);
		$title_eng = $request->validated('title_eng');
		$title_geo = $request->validated('title_geo');

		$movie = new Movie();

		$translations = [['en' => ucwords($title_eng), 'ge' => $title_geo]];
		$movie->setTranslations('title', $translations);

		$movie->save();

		return redirect()->route('dashboard', ['locale' => Config::get('app.locale')]);
	}

	//Delete Movie
	public function destroy($locale, Movie $movie)
	{
		App::setLocale($locale);
		$movie->delete();

		return redirect()->route('dashboard', ['locale' => Config::get('app.locale')]);
	}

	//Update Movie
	public function update($locale, MovieValidateRequest $request, Movie $movie)
	{
		App::setLocale($locale);
		$title_eng = $request->validated('title_eng');
		$title_geo = $request->validated('title_geo');

		$translations = [['en' => ucwords($title_eng), 'ge' => $title_geo]];

		$movie->replaceTranslations('title', $translations);

		$movie->save();

		return redirect()->route('dashboard', ['locale' => Config::get('app.locale')]);
	}

	//Show Movie Edit Form
	public function edit($locale, Movie $movie)
	{
		App::setLocale($locale);
		return view('admin.movies.edit', [
			'movies' => $movie,
		]);
	}
}
