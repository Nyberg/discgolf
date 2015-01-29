<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration {

    public function up()
    {
        Schema::create('forum_categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle');
            $table->integer('group_id');
            $table->integer('author_id');
            $table->integer('club_id');
            $table->integer('views');
            $table->timestamps();
        });
        Schema::create('forum_threads', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('group_id');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->integer('status');
            $table->integer('club_id');
            $table->integer('views');
            $table->timestamps();

        });
        Schema::create('forum_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('body');
            $table->integer('group_id');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->integer('thread_id');
            $table->timestamps();
        });
        Schema::create('forum_groups', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('desc');
            $table->integer('author_id');
            $table->integer('club_id');
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
        Schema::drop('forum_groups');
        Schema::drop('forum_threads');
        Schema::drop('forum_categories');
        Schema::drop('forum_comments');
    }
}
