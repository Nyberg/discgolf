<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Score extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'scores';
    protected $fillable = ['score'];

    public function hole(){
        return $this->belongsTo('Hole');
    }

    public function round(){
        return $this->belongsTo('Round');
    }
}
