<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateElementSitesTable.
 */
class CreateElementSitesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('element_sites', function(Blueprint $table) {
            $table->id();
            $table->string('quem_somos');
            $table->text('text_abert');
            $table->text('missao');
            $table->text('visao');
            $table->text('valores');
            $table->string('oferec_title');
            $table->binary('oferec_text');
            $table->string('se_associa_title');
            $table->text('se_associa_text');
            $table->string('histo_title');
            $table->string('histo_subtitulo');
            $table->text('histo_resum');
            $table->text('histo_text');
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('element_sites');
	}
}
