<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

    public function up()
{
    Schema::create('reviews', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('course_id');
        $table->longtext('body');
        $table->text('head');
        $table->integer('rating');
        $table->timestamps();
    });
}

	public function down()
	{
		Schema::drop('reviews');
	}

}
