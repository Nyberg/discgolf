<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

        public function up()
    {
        Schema::create('photos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('imageable_id')->unsigned();
            $table->string('imageable_type');
            $table->text('url');
            $table->timestamps();
        });
    }

        public function down()
    {
        Schema::drop('photos');
    }

}
