<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWindsTable extends Migration {

	public function up()
	{
        Schema::create('winds', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('winds');
	}

}
