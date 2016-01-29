<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceLineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_line', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('id_category');
                        $table->integer('id_item');
                        $table->integer('id_invoice');                        
                        $table->float('regular_price');
                        $table->integer('quantity');
                        $table->integer('discount');
                        $table->float('final_price');
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
		Schema::dropIfExists('invoice_line');
	}

}
