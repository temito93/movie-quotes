<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateQuoteRequest extends FormRequest
{
	public function rules()
	{
		return [
			'body_eng'  => ['required', 'max:80', 'regex:/(^[A-Za-z0-9!?_ ]+$)/'],
			'body_geo'  => ['required', 'max:80','regex:/(^[ა-ჰ0-9!?_ ]+$)/'],
			'movie_id'  => ['required', 'exists:movies,id'],
			'image'     => ['required', 'image'],
		];
	}
}
