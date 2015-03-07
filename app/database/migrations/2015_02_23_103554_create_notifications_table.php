<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

    public function up()
    {
        Schema::create('notifications', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('type', 128)->nullable();
            $table->string('subject', 128)->nullable();
            $table->text('body')->nullable();
            $table->integer('object_id')->unsigned();
            $table->string('object_type', 128);
            $table->string('url', 128);
            $table->integer('sender_id')->nullable()->unsigned();
            $table->boolean('is_read')->default(0);
            $table->dateTime('sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('notifications');
    }


}
