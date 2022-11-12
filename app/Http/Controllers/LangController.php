<?php

namespace App\Http\Controllers;

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
}
