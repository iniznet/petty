<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('series', function (Blueprint $table) {
			$table->id();
			$table->text('title');
			$table->string('slug', 50);
			$table->string('status', 25);
			$table->string('author', 50);
			$table->string('artist', 50);
			$table->integer('release_year', 4);
			$table->text('content')->nullable();
			$table->unsignedBigInteger('author_id');
			$table->timestamps();

			$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('series');
	}
};