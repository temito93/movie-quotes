<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieValidateRequest extends FormRequest
{
	public function rules()
	{
		return [
			'title_eng'          => ['required', 'regex:/(^[A-Za-z0-9_ ]+$)/'],
			'title_geo'          => ['required', 'regex:/(^[ა-ჰ0-9_ ]+$)/'],
		];
	}
}
