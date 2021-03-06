<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class News extends Eloquent implements UserInterface, RemindableInterface  {

    use UserTrait, RemindableTrait;

    protected $table = 'news';
    protected $fillable = ['club_id', 'body', 'head'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

}