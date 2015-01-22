<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
{
    Schema::create('reviews', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('course_id');
        $table->longtext('body');
        $table->integer('rating');
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
