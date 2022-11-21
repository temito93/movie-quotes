<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\MovieValidateRequest;

class MoviesController extends Controller
{
	//Show All Movies
	public function show($locale, Quote $quote, Movie $movie)
	{
		App::setLocale($locale);
        $quoteAll = $quote::all();
		$curQuote =  $quoteAll->count() ?  $quoteAll->random(1) :  $quoteAll;
		$curMovie =  $quoteAll->count() ? $movie->get()->where('id', $curQuote[0]->movie_id) : $movie::all();

		return view('main.index', [
			'movies'  => $curMovie,
			'quote'   => $curQuote,
		]);
	}

	//Show Movie With Quotes
	public function movie($locale, Movie $movie, $id)
	{
		App::setLocale($locale);
		return view('main.movie', [
			'movie'  => $movie->where('id', $id)->get(),
			'quotes' => Quote::where('movie_id', $id)->get(),
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
