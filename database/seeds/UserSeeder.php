<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

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
