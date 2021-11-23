<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenioPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('convenio_id');
            $table->unsignedBigInteger('photo_id');
            $table->timestamps();
        });

        Schema::table('convenio_photos', function (Blueprint $table){
            $table->foreign('convenio_id')->references('id')->on('convenios')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenio_photos');
    }
}
