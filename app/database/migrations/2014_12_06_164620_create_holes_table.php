<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolesTable extends Migration {

	public function up()
	{
		Schema::create('holes', function(Blueprint $table){

            $table->increments('id');
            $table->integer('tee_id');
            $table->integer('course_id');
            $table->integer('number')->nullable();
            $table->integer('length')->nullable();
            $table->integer('par')->nullable();
            $table->string('name')->nullable();
            $table->string('image', '255');
            $table->integer('check');
            $table->timestamps();

	    });
    }

	public function down()
	{
		Schema::drop('holes');
	}

}
