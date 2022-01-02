<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galery_id');
            $table->unsignedBigInteger('photo_id');
            $table->timestamps();
        });

        Schema::table('galery_photos', function (Blueprint $table){
            $table->foreign('galery_id')->references('id')->on('galeries')->onDelete('cascade');
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
        Schema::dropIfExists('galery_photos');
    }
}
