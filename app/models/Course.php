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

    public function hole(){
        return $this->hasMany('Hole');
    }

    public function review(){
        return $this->hasMany('Review');
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
}
