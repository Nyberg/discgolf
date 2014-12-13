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
            $table->integer('user_id');
            $table->string('user');
            $table->integer('total');
            $table->longText('comment');
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
