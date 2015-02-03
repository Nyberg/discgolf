<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Hole extends Eloquent implements UserInterface, RemindableInterface  {

    use UserTrait, RemindableTrait;

    protected $table = 'holes';
    protected $fillable = ['number', 'length', 'par', 'name'];

    public function tee()
    {
        return $this->belongsTo('Tee');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

    public function score(){
        return $this->hasMany('Score');
    }

    public function shot(){
        return $this->hasMany('Shot');
    }

    public function detail(){
        return $this->hasOne('Detail');
    }

    public function lost(){
        return $this->hasMany('Lost');
    }

    public function records(){
        return $this->belongsTo('Record');
    }
}