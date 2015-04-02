<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeesTable extends Migration {

    public function up()
    {
        Schema::create('tees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('club_id');
            $table->string('color');
            $table->integer('par');
            $table->integer('holes');
            $table->integer('status');
            $table->timestamps();
        });
    }

	public function down()
	{
		Schema::drop('tees');
	}

}
