<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('genre_relationships', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('series_id');
			$table->unsignedBigInteger('genre_id');
			$table->timestamps();

			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
			$table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('genre_relationships');
	}
};