<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('states', function(Blueprint $table){

            $table->increments('id');
            $table->string('state');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('states');
	}

}
