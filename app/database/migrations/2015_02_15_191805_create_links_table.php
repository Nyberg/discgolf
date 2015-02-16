<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration {

	public function up()
	{
        Schema::create('links', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('views');
            $table->integer('cliks');
            $table->string('url');
            $table->string('name');
            $table->string('type');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('links');
	}

}
