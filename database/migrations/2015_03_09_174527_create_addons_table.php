<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addons', function(Blueprint $table)
		{
			$table->string('id',13);
			$table->primary('id');			
			$table->timestamps();
			$table->integer('price');
			$table->string('product_number');
			$table->string('title',40);
			$table->string('desc');
			$table->string('thumbnail');
			$table->string('image');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addons');
	}

}
