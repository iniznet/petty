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
				'name' => 'User',
				'username' => 'user1',
				'email' => 'user1@mail.com',
				'password' => password_hash('password', PASSWORD_DEFAULT),
				'role' => 'member',
			];

			DB::table('users')->insert($data);
		});
	}
}