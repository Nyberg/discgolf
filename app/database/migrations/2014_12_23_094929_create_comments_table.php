<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	public function up()
	{
        Schema::create('comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');
            $table->text('body');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('comments');
	}

}
