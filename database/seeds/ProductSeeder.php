<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
		$faker = Faker::create('id_ID');

		for ($i = 0; $i < 50; $i++) {
			Product::create([
				'uuid' => Str::uuid()->toString(),
				'name' => $faker->colorName,
				'price' => $faker->randomNumber(4),
				'photo' => '/assets/img/default.jpg',
				'description' => $faker->text,
			]);
		}
    }
}
