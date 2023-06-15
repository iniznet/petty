<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('user_bookmarks', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('series_id');
			$table->string('type');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('user_bookmarks');
	}
};