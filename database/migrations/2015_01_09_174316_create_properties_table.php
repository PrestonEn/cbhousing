<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->string('id',13);
			$table->primary('id')
			->references('property_id')
			->on('postings')
			->onDelete('cascade');			
			$table->timestamps();
			$table->string('title', 60);
			$table->string('landlord_email');
			$table->text('description');
			$table->text('property_type');
			$table->text('address');
			$table->text('amenities');
			$table->timestamp('posted_at');
			$table->string('thumbnail');
			$table->string('image');
			$table->integer('rooms');
			$table->double('distance');
			$table->double('time_to_bus');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properties');
	}

}
