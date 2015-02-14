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
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->longText('info')->nullable();
            $table->integer('club_id');
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
