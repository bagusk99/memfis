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
				'price' => $faker->randomNumber(4),
				'name' => $faker->colorName,
				'description' => $faker->text,
			]);
		}
    }
}
