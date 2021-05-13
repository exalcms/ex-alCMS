<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMensPresidsTable.
 */
class CreateMensPresidsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mens_presids', function(Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->text('introd');
            $table->text('texto');
            $table->enum('publica', ['s', 'n'])->default('n');
            $table->enum('ativa', ['s', 'n'])->default('n');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id');
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
		Schema::drop('mens_presids');
	}
}
