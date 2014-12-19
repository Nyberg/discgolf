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
            $table->string('country', '255');
            $table->string('state', '255');
            $table->string('city', '255');
            $table->integer('par');
            $table->integer('holes');
            $table->string('image', '200');
            $table->string('fee', '255');
            $table->longText('information', '2000');
            $table->number('club_id', '255');
            $table->string('course_map', '255');
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
