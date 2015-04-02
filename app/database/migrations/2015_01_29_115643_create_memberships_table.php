<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration {

	public function up()
	{
        Schema::create('memberships', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('club_id');
            $table->integer('status');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('memberships');
	}

}
