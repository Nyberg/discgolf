<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationsTable extends Migration {

	public function up()
    {
        Schema::create('activations', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->string('token');
            $table->timestamps();

        });
    }

	public function down()
	{
		Schema::drop('activations');
	}

}
