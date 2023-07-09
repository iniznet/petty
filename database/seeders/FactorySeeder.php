<?php

namespace Database\Seeders;

use Petty\Database\Seeder;

class FactorySeeder extends Seeder
{
	public function run(): void
	{
		$this->add(AdminSeeder::class, 1);
		$this->add(UserSeeder::class, 1);
	}
}