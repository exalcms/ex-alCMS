<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAssociationsTable.
 */
class CreateAssociationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('associations', function(Blueprint $table) {
            $table->id();
            $table->string('raz_soc');
            $table->string('cnpj');
            $table->string('end');
            $table->string('comple_end')->nullable();
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('uf');
            $table->string('site');
            $table->string('email');
            $table->string('tel');
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
		Schema::drop('associations');
	}
}
