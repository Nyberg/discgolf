<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration {

	public function up()
	{
        Schema::create('replies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('comment_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('replies');
	}

}
