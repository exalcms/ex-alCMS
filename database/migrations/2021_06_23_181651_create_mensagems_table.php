<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMensagemsTable.
 */
class CreateMensagemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mensagems', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('tele');
            $table->enum('cadastrado', ['s', 'n'])->default('n');
            $table->enum('meio_comunic', ['email', 'wzap', 'sms'])->default('email');
            $table->string('subject');
            $table->text('mensagem');
            $table->enum('status', ['l', 'nl', 'resp'])->default('nl');
            $table->text('resposta')->nullable();
            $table->unsignedBigInteger('resp_autor')->nullable();
            $table->dateTime('resp_data')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('mensagems');
	}
}
