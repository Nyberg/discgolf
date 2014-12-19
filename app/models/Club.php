<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Club extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'clubs';
    protected $fillable = ['name', 'website', 'country', 'state', 'par'];


    public function user(){
        return $this->hasMany('User');
    }

    public function course(){
        return $this->hasMany('Course');
    }
}
