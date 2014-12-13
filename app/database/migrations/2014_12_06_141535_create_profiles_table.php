<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

    public function up()
    {
        Schema::create('profiles', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('phone', '20')->nullable();
            $table->string('country', '100')->nullable();
            $table->string('state', '100')->nullable();
            $table->string('city', '100')->nullable();
            $table->longText('info')->nullable();
            $table->string('club')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('profiles');
    }

}
