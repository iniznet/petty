<?php

namespace Database\Seeders;

use Petty\Database\Seeder;
use Petty\Database\QueryBuilder as DB;

class UserSeeder extends Seeder
{
	protected int $max = 1;

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