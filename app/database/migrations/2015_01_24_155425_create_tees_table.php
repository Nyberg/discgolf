<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('tees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->string('color');
            $table->integer('par');
            $table->integer('holes');
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
		//
	}

}
