<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingImages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posting_images', function(Blueprint $table)
		{
			$table->string('id',13);
			$table->primary('id');			
			$table->string('location');
			$table->string('file_name');
			$table->timestamps();
			$table->string('posting_id',13);
			$table->foreign('posting_id')
				  ->references('id')
				  ->on('postings')
				  ->onDelete('cascade');

		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posting_images');	
	}

}
