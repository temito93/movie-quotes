<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movies;
use App\Models\Quotes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$movies = Movies::factory()->create();

		Quotes::factory(5)->create([
			'movies_id' => $movies->id,
		]);
	}
}
