<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

        public function up()
    {
        Schema::create('images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('club');
            $table->integer('imageable_id')->unsigned();
            $table->string('imageable_type');
            $table->text('url');
            $table->timestamps();
        });
    }

        public function down()
    {
        Schema::drop('images');
    }

}
