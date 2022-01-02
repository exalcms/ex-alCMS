<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGaleriesTable.
 */
class CreateGaleriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galeries', function(Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('data');
            $table->string('local')->nullable();
            $table->string('tipo');
            $table->text('descricao')->nullable();
            $table->enum('publicada', ['s', 'n'])->default('n');
            $table->softDeletes();
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
		Schema::drop('galeries');
	}
}
