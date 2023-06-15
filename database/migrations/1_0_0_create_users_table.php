<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('name', 50);
			$table->string('username', 30);
			$table->string('email');
			$table->string('password', 255);
			$table->string('role', 25);
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('users');
	}
};