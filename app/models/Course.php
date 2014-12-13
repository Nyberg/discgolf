<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Course extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';
    protected $fillable = ['name', 'location', 'holes', 'par'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

 /*   public function profile()
    {
        return $this->HasOne('Profile');
    } */

    public function hole(){
        return $this->hasMany('Hole');
    }

    public function round(){
        return $this->hasMany('Round');
    }
}
