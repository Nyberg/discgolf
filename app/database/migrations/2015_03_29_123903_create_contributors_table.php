<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributorsTable extends Migration {

	public function up()
	{
        Schema::create('contributors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('body');
            $table->string('url');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('contributors');
	}

}
