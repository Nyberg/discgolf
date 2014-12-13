<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Round extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rounds';
    protected $fillable = ['course_id', 'user_id', 'comment'];

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

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function Score(){
        return $this->hasMany('Score');
    }

}
