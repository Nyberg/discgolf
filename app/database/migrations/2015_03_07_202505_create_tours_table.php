<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration {


	public function up()
	{
        Schema::create('tours', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('rounds');
            $table->string('date');
            $table->integer('club_id');
            $table->longtext('information');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('tours');
	}

}
