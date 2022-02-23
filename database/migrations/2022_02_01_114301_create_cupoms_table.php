<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCupomsTable.
 */
class CreateCupomsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cupoms', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->decimal('value');
            $table->boolean('percent')->default(0);
            $table->date('validade')->nullable();
            $table->boolean('ativo')->default(0);
            $table->string('role');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('cupoms');
	}
}
