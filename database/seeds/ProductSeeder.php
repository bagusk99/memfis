<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
		$data = [
			[
				'uuid' => Str::uuid()->toString(),
				'name' => 'Pecel',
				'description' => 
				'Makana Khas Jawa timur yang terdiri dari sayur dan bumbu kancang',
				'price' => 50000,
			],
			[
				'uuid' => Str::uuid()->toString(),
				'name' => 'Peuyeum',
				'description' => 
				'Terbuat dari singkong yang difermentasi',
				'price' => 120000,
			],
		];

		Product::insert($data);
    }
}
