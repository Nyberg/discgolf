<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagsTable extends Migration {

	public function up()
	{
        Schema::create('bags', function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->integer('discs');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('bags');
	}

}
