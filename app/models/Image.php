<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Image extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'image';
    protected $fillable = ['image', 'thumbnail'];


    public function courses(){
        return $this->belongsToMany('Course', 'course_image', 'course_id', 'image_id');
    }

}
