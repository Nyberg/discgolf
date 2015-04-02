<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscsTable extends Migration {

	public function up()
	{
        Schema::create('discs', function(Blueprint $table){

            $table->increments('id');
            $table->integer('bag_id');
            $table->string('name', '255');
            $table->string('author', '255');
            $table->string('plastic', '255');
            $table->integer('weight');
            $table->string('condition', '255');
            $table->string('type', '255');
            $table->string('mixed', '255');
            $table->integer('user_id');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('discs');
	}

}
