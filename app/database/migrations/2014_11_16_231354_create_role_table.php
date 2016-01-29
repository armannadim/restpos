<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('roles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('role');
        });

        DB::table('roles')->insert(
                array(
                    array('role' => 'admin'),
                    array('role' => 'manager'),
                    array('role' => 'other'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::table('roles')->delete();
        Schema::dropIfExists('roles');
    }

}
