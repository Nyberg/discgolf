<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration {

	public function up()
	{
		Schema::create('details', function(Blueprint $table){
        $table->increments('id');
        $table->integer('hole_id');
        $table->longText('ob', '2000')->nullable();
        $table->timestamps();

    });
	}

	public function down()
	{
		Schema::drop('details');
	}

}
