<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class LangController extends Controller
{
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
