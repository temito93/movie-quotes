<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Support\Facades\App;
use App\Http\Requests\MovieValidateRequest;

class MoviesController extends Controller
{
	//Show All Movies
	public function show($locale)
	{
		App::setLocale($locale);
		return view('main.index', [
			'movies' => Movies::latest()->get(),
		]);
	}

	//Show Movie Upload Form
	public function index($locale)
	{
		App::setLocale($locale);
		return view('admin.movies.create', [
			'movies' => Movies::latest()->get(),
		]);
	}

	//Upload Movie
	public function store($locale, MovieValidateRequest $request)
	{
		App::setLocale($locale);
		$title_eng = $request->validated('title_eng');
		$title_geo = $request->validated('title_geo');

		$movie = new Movies();

		$translations = [['en' => ucwords($title_eng), 'ge' => $title_geo]];
		$movie->setTranslations('title', $translations);

		$movie->save();

		return redirect('/admin/main/' . $locale);
	}

	//Delete Movie
	public function destroy($locale, Movies $movie)
	{
		App::setLocale($locale);
		$movie->delete();

		return redirect('/admin/main/' . $locale);
	}

	//Update Movie
	public function update($locale, MovieValidateRequest $request, Movies $movie)
	{
		App::setLocale($locale);
		$title_eng = $request->validated('title_eng');
		$title_geo = $request->validated('title_geo');

		$translations = [['en' => ucwords($title_eng), 'ge' => $title_geo]];

		$movie->replaceTranslations('title', $translations);

		$movie->save();

		return redirect('/admin/main/' . $locale);
	}

	//Show Movie Edit Form
	public function edit($locale, Movies $movie)
	{
		App::setLocale($locale);
		return view('admin.movies.edit', [
			'movies' => $movie,
		]);
	}
}
