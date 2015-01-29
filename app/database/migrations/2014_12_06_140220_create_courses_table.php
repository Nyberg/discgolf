<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table){

            $table->increments('id');
            $table->string('name', '255');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('image', '200');
            $table->string('fee', '255');
            $table->longText('information', '2000');
            $table->integer('club_id');
            $table->string('course_map', '255');
            $table->boolean('status');
            $table->string('long', '255');
            $table->string('lat', '255');
            $table->timestamps();

        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
