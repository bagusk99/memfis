<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
		$faker = Faker::create('id_ID');

		for ($i = 0; $i < 30; $i++) {
			User::create([
				'uuid' => Str::uuid()->toString(),
				'roles_id' => 1,
				'email' => $faker->email,
				'password' => Hash::make('123qweasd'),
			]);
		}

		for ($i = 30; $i < 50; $i++) {
			User::create([
				'uuid' => Str::uuid()->toString(),
				'roles_id' => 2,
				'email' => $faker->email,
				'password' => Hash::make('123qweasd'),
			]);
		}

		User::create([
			'uuid' => Str::uuid()->toString(),
			'roles_id' => 3,
			'email' => 'admin@admin.com',
			'password' => Hash::make('123qweasd'),
		]);
    }
}
