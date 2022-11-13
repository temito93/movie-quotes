<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateQuoteRequest extends FormRequest
{
	public function rules()
	{
		return [
			'body_eng'  => ['required', 'regex:/(^[A-Za-z0-9!?_ ]+$)/'],
			'body_geo'  => ['required', 'regex:/(^[ა-ჰ0-9!?_ ]+$)/'],
			'movie_id'  => ['required', Rule::exists('movies', 'id')],
			'image'     => ['required', 'image'],
		];
	}
}
