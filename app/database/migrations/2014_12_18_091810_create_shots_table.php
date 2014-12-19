<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('shots', function(Blueprint $table){
            $table->increments('id');
            $table->integer('number');
            $table->integer('round_id');
            $table->integer('hole_id');
            $table->integer('user_id');
            $table->integer('x');
            $table->integer('y');
            $table->integer('disc');
            $table->integer('comment');
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
		Schema::drop('shots');
	}

}
