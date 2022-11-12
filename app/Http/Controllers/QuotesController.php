<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Quotes;
use Illuminate\Support\Facades\App;
use App\Http\Requests\QuoteUpdateRequest;
use App\Http\Requests\ValidateQuoteRequest;

class QuotesController extends Controller
{
	//Show All Quotes
	public function index($locale)
	{
		App::setLocale($locale);
		return view('admin.quotes.index', [
			'quotes' => Quotes::latest()->get(),
		]);
	}

	//Show Quotes Upload Form
	public function show($locale, Movies $movie)
	{
		App::setLocale($locale);
		return view('admin.quotes.create', [
			'movies' => $movie::all(),
		]);
	}

	//Show Quotes Edit Form
	public function edit($locale, Quotes $quote, Movies $movies)
	{
		App::setLocale($locale);

		return view('admin.quotes.edit', [
			'quote'      => $quote,
			'movies'     => $movies->get(),
			'movie_name' => $movies->get()->where('id', $quote->movies_id),
		]);
	}

	//Upload Quotes
	public function store($locale, ValidateQuoteRequest $request)
	{
		App::setLocale($locale);
		$body_eng = $request->validated('body_eng');
		$body_geo = $request->validated('body_geo');
		$movie_id = $request->validated('movies_id');
		$image = $request->validated('image');

		$translattions = [['en' => ucwords($body_eng), 'ge' => $body_geo]];

		$image = request()->file('image')->store('images');

		Quotes::create([
			'body'      => $translattions,
			'movies_id' => $movie_id,
			'image'     => $image,
		]);

		return redirect('/admin/' . $locale . '/quotes');
	}

	//Update Quote
	public function update($locale, Quotes $quote, QuoteUpdateRequest $request)
	{
		App::setLocale($locale);

		$body_eng = $request->validated('body_eng');
		$body_geo = $request->validated('body_geo');
		$movie_id = $request->validated('movies_id');
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
			'movies_id' => $movie_id,
			'image'     => $image,
		]);

		return redirect('/admin/' . $locale . '/quotes');
	}

	//Delete Quote
	public function destroy($locale, Quotes $quote)
	{
		App::setLocale($locale);
		$quote->delete();

		return redirect('/admin/' . $locale . '/quotes');
	}
}
