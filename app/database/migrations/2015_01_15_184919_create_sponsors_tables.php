<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTables extends Migration {

	public function up()
	{
        Schema::create('sponsors', function(Blueprint $table){

            $table->increments('id');
            $table->string('name', '255');
            $table->string('image', '255');
            $table->string('url', '255');
            $table->integer('user_id');
            $table->integer('views');
            $table->integer('clicks');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('sponsors');
	}

}
