<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Employee;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
		$faker = Faker::create('id_ID');

		for ($i = 0; $i < 30; $i++) {
			Employee::create([
				'users_id' => $i+1,
				'uuid' => Str::uuid()->toString(),
				'name' => $faker->name,
			]);
		}
    }
}
