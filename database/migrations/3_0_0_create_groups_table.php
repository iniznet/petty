<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('groups', function (Blueprint $table) {
			$table->id();
			$table->text('title');
			$table->string('slug', 50);
			$table->string('status', 25);
			$table->text('content')->nullable();
			$table->text('url')->nullable();
			$table->unsignedBigInteger('author_id');
			$table->timestamps();

			$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('groups');
	}
};