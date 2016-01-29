<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique(); //Username only unique field, this user usually will be a employee of the restaurent
            $table->string('password'); //password hashed will be saved here
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullname'); //User's fullname            
            $table->string('email'); //User email
            $table->string('contact'); //Telephone or mobile number of the user
            $table->integer('role'); //Role of the user (App_Admin, rest_admin, receptionist, waiter etc, it's a foreign key)
            $table->integer('added_by'); //The user who added this user on the database (Foreign Key)
            $table->integer('removed_by'); //If the user has been deleted then the username of the remover will show here (Foreign Key)
            $table->string('remember_token'); //This token will be used to validate remember me option
            
            $table->timestamps(); //Create_at and update_at options of framework
            $table->string('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
