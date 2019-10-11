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
    }
}
