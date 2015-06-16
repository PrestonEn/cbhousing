<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postings', function(Blueprint $table)
		{
			$table->string('id',13);
			$table->primary('id');
			$table->string('title');
			$table->boolean('locked')->default(false);
			$table->string('tenant_id')->default(NULL);
			$table->timestamps();
			$table->integer('price');
			$table->string('posting_type');
			$table->string('property_id',13);
			$table->foreign('property_id')
				  ->references('id')
				  ->on('properties')
				  ->onDelete('cascade');
			$table->date('available');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postings');
	}

}
