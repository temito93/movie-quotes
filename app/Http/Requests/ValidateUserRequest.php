<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
{
	public function rules()
	{
		return [
			'email'    => 'required',
			'password' => 'required',
		];
	}
}
