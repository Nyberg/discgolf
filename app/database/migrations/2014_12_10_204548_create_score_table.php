<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scores', function(Blueprint $table){

            $table->increments('id');
            $table->integer('round_id');
            $table->integer('user_id');
            $table->integer('hole_id');
            $table->integer('score');
            $table->integer('par');
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
		Schema::drop('scores');
	}

}
