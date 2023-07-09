<?php

namespace Database\Seeders;

use Petty\Database\Contracts\Seed;
use Petty\Database\QueryBuilder as DB;

class AdminSeeder extends Seed
{
	public function run(): void
	{
		$this->group(function () {
			$data = [
				'name' => 'Admin',
				'username' => 'admin',
				'email' => 'admin@mail.com',
				'password' => password_hash('admin', PASSWORD_DEFAULT),
				'role' => 'admin',
			];

			DB::table('users')->insert($data);
		});
	}
}