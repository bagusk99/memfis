<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
		$data = [
			[
				'name' => 'employee',
				'uuid' => Str::uuid()->toString()
			],
			[
				'name' => 'customer',
				'uuid' => Str::uuid()->toString()
			],
		];

		Role::insert($data);
    }
}
