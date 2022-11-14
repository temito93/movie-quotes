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

	public function homeGe()
	{
		App::setLocale('ge');
		return redirect('/ge');
	}

	public function homeEn()
	{
		App::setLocale('en');
		return redirect('/en');
	}
}
