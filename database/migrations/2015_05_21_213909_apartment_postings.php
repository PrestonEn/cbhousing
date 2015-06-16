<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApartmentPostings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartment_postings', function(Blueprint $table)
		{
			$table->string('posting_id',13);
			$table->primary('posting_id');
			$table->foreign('posting_id')
				->references('id')
			    ->on('postings')
				->onDelete('cascade');
				
			$table->string('property_id',13);	
			$table->foreign('property_id')
				->references('id')
				->on('properties')
				->onDelete('cascade');
			$table->integer('total');
			$table->integer('filled')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('apartment_postings');
	}

}
