<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Favortie extends Eloquent implements UserInterface, RemindableInterface  {

    use UserTrait, RemindableTrait;

    protected $table = 'favorites';
    protected $fillable = ['user_id', 'course_id'];

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function user(){
        return $this->hasOne('User');
    }
}