<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Round extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'rounds';
    protected $fillable = ['course_id', 'user_id', 'comment'];

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function score(){
        return $this->hasMany('Score');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

}
