<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('holes', function(Blueprint $table){

            $table->increments('id');
            $table->integer('course_id');
            $table->integer('number')->nullable();
            $table->integer('length')->nullable();
            $table->integer('par')->nullable();
            $table->string('name')->nullable();
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
		Schema::drop('holes');
	}

}
