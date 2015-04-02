<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('first_name', '255');
            $table->string('last_name', '255');
            $table->string('email', '255');
            $table->string('password', '255');
            $table->string('image', '255')->nullable();
            $table->string('metric', '255')->nullable();
            $table->integer('club_id');
            $table->integer('activated');
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }

}
