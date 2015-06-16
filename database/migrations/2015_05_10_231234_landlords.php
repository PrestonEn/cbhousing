<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Landlords extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('landlords', function(Blueprint $table)
		{
			$table->string('id',13);
			$table->primary('id');
			$table->timestamps();			
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('name');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('landlords');	
	}

}
