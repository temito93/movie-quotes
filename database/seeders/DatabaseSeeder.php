<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$movies = Movie::factory()->create();

		Quote::factory(5)->create([
			'movies_id' => $movies->id,
		]);
	}
}
