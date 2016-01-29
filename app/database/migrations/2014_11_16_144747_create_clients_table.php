<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('firstname');
                        $table->string('lastname');
                        $table->string('surname');
                        $table->string('identity');
                        $table->string('address');
                        $table->string('country');
                        $table->string('city');
                        $table->timestamp('lastvisit');
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
		Schema::dropIfExists('clients');
	}

}
