<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', '255');
            $table->string('last_name', '255');
            $table->string('email', '255');
            $table->string('password', '255');
            $table->string('image', '255')->nullable();
            $table->string('metric', '255')->nullable();
            $table->integer('club_id');
            $table->integer('activated');
            $table->string('remember_token')->nullable();
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
		Schema::drop('registrations');
	}

}
