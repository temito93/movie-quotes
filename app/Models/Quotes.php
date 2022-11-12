<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotes extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $fillable = ['body', 'image', 'movies_id'];

	public $translatable = ['body'];

	public function movies()
	{
		return $this->belongsTo(Movies::class, 'movies_id');
	}
}
