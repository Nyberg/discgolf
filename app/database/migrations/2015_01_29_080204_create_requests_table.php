<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	public function up()
	{
        Schema::create('requests', function(Blueprint $table){

            $table->increments('id');
            $table->integer('club_id');
            $table->integer('user_id');
            $table->integer('status');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('requests');
	}

}
