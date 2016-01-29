<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodCategoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('food_category', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('food_category')->insert(
                array(
                    array('name' => 'drinks'),
                    array('name' => 'starter'),
                    array('name' => 'main'),
                    array('name' => 'main_special'),
                    array('name' => 'main_accompany'),
                    array('name' => 'postre'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::table('food_category')->delete();
        Schema::dropIfExists('food_category');
    }

}
