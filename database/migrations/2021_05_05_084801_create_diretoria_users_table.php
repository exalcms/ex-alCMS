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
            $table->unsignedBigInteger('id_diretoria');
            $table->foreign('id_diretoria')->references('id')->on('diretorias');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->enum('ativo', ['s', 'n'])->default('s');
            $table->year('inic_mand')->nullable();
            $table->year('fim_mand')->nullable();
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
