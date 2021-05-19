<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePhotosTable.
 */
class CreatePhotosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_path');
            $table->string('origin_name');
            $table->string('using')->nullable();
            $table->string('title')->nullable();
            $table->string('legenda')->nullable();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}
}
