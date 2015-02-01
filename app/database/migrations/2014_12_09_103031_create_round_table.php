<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
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
            $table->integer('par_id');
            $table->longText('comment');
            $table->boolean('status');
            $table->string('date');
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
		Schema::drop('rounds');
	}

}
