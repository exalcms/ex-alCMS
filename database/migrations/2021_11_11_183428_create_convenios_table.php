<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateConveniosTable.
 */
class CreateConveniosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convenios', function(Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('end');
            $table->string('comple')->nullable();
            $table->string('tele');
            $table->string('site')->nullable();
            $table->string('email');
            $table->string('objeto');
            $table->text('beneficios');
            $table->string('condicions');
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->boolean('photo')->default(false);
            $table->text('obs')->nullable();
            $table->date('data_valid');
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
		Schema::drop('convenios');
	}
}
