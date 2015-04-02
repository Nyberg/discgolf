<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTables extends Migration {

	public function up()
	{
        Schema::create('news', function(Blueprint $table){

            $table->increments('id');
            $table->string('head', '255');
            $table->longText('body', '2000');
            $table->integer('user_id');
            $table->integer('views');
            $table->string('image');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('news');
	}

}
