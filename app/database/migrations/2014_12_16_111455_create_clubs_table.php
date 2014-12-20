<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('clubs', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', '255');
            $table->string('country', '255');
            $table->string('state', '255');
            $table->string('city', '255');
            $table->string('image', '255')->nullable();
            $table->string('website', '255')->nullable();
            $table->longText('information', '2000');
            $table->integer('members');
            $table->boolean('status');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clubs');
	}

}
