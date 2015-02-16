<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

	public function up()
	{
        Schema::create('records', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('course_id');
            $table->integer('tee_id');
            $table->integer('user_id');
            $table->integer('round_id');
            $table->string('type');
            $table->integer('total');
            $table->integer('par_id');
            $table->integer('status');
            $table->string('date');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('records');
	}

}
