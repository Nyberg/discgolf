<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupRoundsTable extends Migration {

	public function up()
	{
        Schema::create('groups', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('tour_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('groups');
	}

}
