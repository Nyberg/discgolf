<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundTable extends Migration {

	public function up()
	{
		Schema::create('rounds', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('course_id');
            $table->integer('tee_id');
            $table->integer('user_id');
            $table->string('username');
            $table->string('type');
            $table->integer('total');
            $table->integer('type_id');
            $table->integer('group_id');
            $table->integer('tour_id');
            $table->integer('weather_id');
            $table->integer('wind_id');
            $table->longText('comment');
            $table->boolean('status');
            $table->string('date');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('rounds');
	}

}
