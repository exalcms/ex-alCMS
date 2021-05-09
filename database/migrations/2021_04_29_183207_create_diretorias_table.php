<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDiretoriasTable.
 */
class CreateDiretoriasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diretorias', function(Blueprint $table) {
            $table->id();
            $table->string('cargo');
            $table->text('atribui')->nullable();
            $table->enum('ativo', ['s', 'n'])->default('s');
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
		Schema::drop('diretorias');
	}
}
