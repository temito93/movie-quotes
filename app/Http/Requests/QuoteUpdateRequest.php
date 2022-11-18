<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteUpdateRequest extends FormRequest
{
	public function rules()
	{
		return [
			'body_eng'  => ['required', 'max:80', 'regex:/(^[A-Za-z0-9_ ]+$)*/'],
			'body_geo'  => ['required', 'max:80','regex:/(^[ა-ჰ0-9_ ]+$)*/'],
			'movie_id'  => ['required', 'exists:movies,id'],
			'image'     => ['image'],
		];
	}
}
