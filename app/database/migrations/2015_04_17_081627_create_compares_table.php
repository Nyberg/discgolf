<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComparesTable extends Migration {

	public function up()
	{
        Schema::create('compares', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('compares');
	}

}
