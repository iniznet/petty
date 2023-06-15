<?php

namespace Database\Seeders;

use Petty\Database\Seeder;

class FactorySeeder extends Seeder
{
	public function run(): void
	{
		$this->add(UserSeeder::class);
	}
}