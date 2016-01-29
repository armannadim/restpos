<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('invoice', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('order_id');
            $table->float('total_price');
            $table->integer('special_discount');
            $table->integer('discounted_price');
            $table->integer('total_item');
            $table->integer('issued_by');//Waiter who billed this invoice
            $table->string('paid_by');//Credit card or cash
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('invoice');
    }

}
