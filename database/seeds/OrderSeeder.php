<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create('id_ID');

		for ($i = 0; $i < 20; $i++) {
			Order::create([
				'uuid' => Str::uuid()->toString(),
				'employees_id' => $i+1,
				'customers_id' => $i+1,
				'products_id' => $i+1,
				'total' => $faker->randomNumber(1),
			]);
		}
    }
}
