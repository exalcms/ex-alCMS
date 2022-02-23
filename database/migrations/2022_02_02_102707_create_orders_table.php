<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrdersTable.
 */
class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('date');
            $table->string('order_num');
            $table->boolean('payment')->default(0);
            $table->decimal('total_order', 9);
            $table->smallInteger('status')->default(1);
            $table->text('obs')->nullable();
            $table->decimal('total_final')->nullable();
            $table->bigInteger('cupom_id')->unsigned()->nullable();
            $table->foreign('cupom_id')->references('id')->on('cupoms');
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
		Schema::drop('orders');
	}
}
