<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Intervention\Image\ImageManager;

class Course extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'courses';
    protected $fillable = ['name', 'location', 'holes', 'par'];

    public function review(){
        return $this->hasMany('Review');
    }

    public function tee(){
        return $this->hasMany('Tee');
    }

    public function round(){
        return $this->hasMany('Round');
    }

    public function club(){
        return $this->belongsTo('Club');
    }

    public function photos()
    {
        return $this->morphMany('Photo', 'imageable');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

    public function country(){
        return $this->belongsTo('Country');
    }

    public function state(){
        return $this->belongsTo('State');
    }

    public function city(){
        return $this->belongsTo('City');
    }

    public function losts(){
        return $this->hasMany('Lost');
    }
}
