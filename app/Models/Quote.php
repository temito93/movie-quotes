<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $fillable = ['body', 'image', 'movie_id'];

	public $translatable = ['body'];

	public function movies()
	{
		return $this->belongsTo(Movie::class, 'movie_id');
	}
}
