<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestCart extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carts', function(Blueprint $table)
		{

			$table->unsignedInteger('request_id');
			$table->foreign('request_id')->
			references('id')->
			on('requests')->
			onDelete('cascade')->
			onUpdate('cascade');

			$table->text('item_name');
			$table->string('product_number');
			$table->integer('item_price');
			$table->integer('quantity');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carts');
	}

}
