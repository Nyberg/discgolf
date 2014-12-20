<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Disc extends Eloquent implements UserInterface, RemindableInterface  {

    use UserTrait, RemindableTrait;

    protected $table = 'discs';
    protected $fillable = ['author', 'name', 'weight', 'plastic', 'condition'];

    public function bag()
    {
        return $this->belongsTo('Bag');
    }

    public function shot(){
        return $this->hasOne('Shot');
    }
}