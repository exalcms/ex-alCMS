<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDiretoriaUsersTable.
 */
class CreateDiretoriaUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diretoria_users', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diretoria_id');
            $table->foreign('diretoria_id')->references('id')->on('diretorias');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('ativo', ['s', 'n'])->default('s');
            $table->year('inic_mand')->nullable();
            $table->year('fim_mand')->nullable();
            $table->boolean('foto')->default(false);
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->foreign('photo_id')->references('id')->on('photos');
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
		Schema::drop('diretoria_users');
	}
}
