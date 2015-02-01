<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostsTable extends Migration {

	public function up()
	{
        Schema::create('losts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('user_id');
            $table->string('type');
            $table->string('status');
            $table->string('date');
            $table->integer('solved');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('losts');
	}

}
