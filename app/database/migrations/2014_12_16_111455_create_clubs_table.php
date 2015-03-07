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
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('image', '255')->nullable();
            $table->string('website', '255')->nullable();
            $table->longText('information', '2000');
            $table->longText('membership', '2000');
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
