<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Requests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')
			->on('users')
			->onDelete('cascade')
			->onUpdate('cascade');
			
			$table->date('move_in');
			$table->date('move_out');
			$table->string('user_email');
			$table->string('property_id');
			$table->string('posting_id');
			$table->timestamps();
			$table->integer('status');
			$table->integer('rent');
			$table->string('cart_json');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('requests');
	}

}
