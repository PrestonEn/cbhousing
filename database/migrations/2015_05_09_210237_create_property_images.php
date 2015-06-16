<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyImages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('property_images', function(Blueprint $table)
		{
			$table->string('id',13);
			$table->primary('id');			
			$table->string('location');
			$table->string('file_name');
			$table->timestamps();
			$table->string('property_id',13);
			$table->foreign('property_id')
				  ->references('id')
				  ->on('properties')
				  ->onDelete('cascade');
		});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('property_images');	
	}

}
