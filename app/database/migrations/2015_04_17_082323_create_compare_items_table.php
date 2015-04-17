<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompareItemsTable extends Migration {

	public function up()
	{
        Schema::create('compare_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('compare_id');
            $table->integer('round_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('compare_items');
	}

}
