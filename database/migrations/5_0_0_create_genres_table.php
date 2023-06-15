<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('genres', function (Blueprint $table) {
			$table->id();
			$table->text('name');
			$table->string('slug', 50);
			$table->text('content')->nullable();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('genres');
	}
};