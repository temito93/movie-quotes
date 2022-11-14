<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
	use HasTranslations;

	protected $fillable = ['title'];

	public $translatable = ['title'];

	public function quotes()
	{
		return $this->hasMany(Quote::class);
	}
}
