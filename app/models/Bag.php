<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bag extends Eloquent implements UserInterface, RemindableInterface  {

    use UserTrait, RemindableTrait;

    protected $table = 'bags';
    protected $fillable = ['type'];

    public function disc()
    {
        return $this->hasMany('Disc');
    }

    public function user(){
        return $this->belongsTo('User');
    }
}