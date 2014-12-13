<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Hole extends Eloquent implements UserInterface, RemindableInterface  {

    use UserTrait, RemindableTrait;

    protected $table = 'holes';
    protected $fillable = ['number', 'length', 'par', 'name'];

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function detail(){
        return $this->hasOne('Detail');
    }
}