<?php

namespace Database\Migrations;

use Petty\Database\Migration;
use Petty\Database\Blueprint;
use Petty\Database\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('chapters', function (Blueprint $table) {
			$table->id();
			$table->text('title');
			$table->string('slug', 50);
			$table->integer('volume', 3)->nullable();
			$table->integer('chapter', 3)->nullable();
			$table->integer('part', 3)->nullable();
			$table->text('url');
			$table->unsignedBigInteger('series_id');
			$table->unsignedBigInteger('group_id');
			$table->unsignedBigInteger('author_id');
			$table->timestamps();

			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
			$table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
			$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('chapters');
	}
};