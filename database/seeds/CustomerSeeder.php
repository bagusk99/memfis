<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
		$faker = Faker::create('id_ID');

		for ($i = 30; $i < 50; $i++) {
			Customer::create([
				'uuid' => Str::uuid()->toString(),
				'users_id' => $i+1,
				'name' => $faker->name,
			]);
		}
    }
}
