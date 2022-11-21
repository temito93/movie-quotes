<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\QuoteUpdateRequest;
use App\Http\Requests\ValidateQuoteRequest;

class QuotesController extends Controller
{
	//Show All Quotes
	public function index($locale)
	{
		App::setLocale($locale);
		return view('admin.quotes.index', [
			'quotes' => Quote::latest()->paginate(10),
		]);
	}

	//Show Quotes Upload Form
	public function show($locale, Movie $movie)
	{
		App::setLocale($locale);
		return view('admin.quotes.create', [
			'movies' => $movie::all(),
		]);
	}

	//Show Quotes Edit Form
	public function edit($locale, Quote $quote, Movie $movies)
	{
		App::setLocale($locale);

		return view('admin.quotes.edit', [
			'quote'      => $quote,
			'movies'     => $movies->get(),
			'movie_name' => $movies->get()->where('id', $quote->movie_id),
		]);
	}

	//Upload Quotes
	public function store($locale, ValidateQuoteRequest $request)
	{
		App::setLocale($locale);
		$body_eng = $request->validated('body_eng');
		$body_geo = $request->validated('body_geo');
		$movie_id = $request->validated('movie_id');
		$image = $request->validated('image');

		$translattions = [['en' => ucwords($body_eng), 'ge' => $body_geo]];

		$image = request()->file('image')->store('images');

		Quote::create([
			'body'      => $translattions,
			'movie_id'  => $movie_id,
			'image'     => $image,
		]);

		return redirect()->route('show_quotes', ['locale' => Config::get('app.locale')]);
	}

	//Update Quote
	public function update($locale, Quote $quote, QuoteUpdateRequest $request)
	{
		App::setLocale($locale);

		$body_eng = $request->validated('body_eng');
		$body_geo = $request->validated('body_geo');
		$movie_id = $request->validated('movie_id');
		$image = $request->validated('image');

		$translattions = [['en' => ucwords($body_eng), 'ge' => $body_geo]];

		if (isset($image))
		{
			$image = request()->file('image')->store('images');
		}
		else
		{
			$image = $quote->image;
		}

		$quote->update([
			'body'      => $translattions,
			'movie_id'  => $movie_id,
			'image'     => $image,
		]);

		return redirect()->route('show_quotes', ['locale' => Config::get('app.locale')]);
	}

	//Delete Quote
	public function destroy($locale, Quote $quote)
	{
		App::setLocale($locale);
		$quote->delete();

		return redirect()->route('show_quotes', ['locale' => Config::get('app.locale')]);
	}
}
