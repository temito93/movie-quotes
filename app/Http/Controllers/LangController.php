<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LangController extends Controller
{
	public function ge()
	{
		App::setLocale('ge');
	}

	public function en()
	{
		App::setLocale(('en'));
	}

	public function homeGe($locale)
	{
		App::setLocale('ge');
		return redirect()->route('homepage', ['locale' => $locale]);
	}

	public function homeEn($locale)
	{
		App::setLocale('en');
		return redirect()->route('homepage', ['locale' => $locale]);
	}
}
