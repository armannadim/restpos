<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('food_items', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500); //Foreign key from list table with different languages,
            $table->string('details', 1000);
            $table->float('regular_price');
            $table->float('discounted_price');
            $table->integer('discount_percentage');
            $table->string('food_category_id'); //Foreign key from list table with different language,Drinks,Starter,maindish, main_specialdish,accompaniment, desert)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('food_items');
    }

}
