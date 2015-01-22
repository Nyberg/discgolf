<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function roles(){
        return $this->belongsToMany('Role', 'assigned_roles');
    }

    public function profile()
    {
    return $this->HasOne('Profile');
    }

    public function round(){
        return $this->hasMany('Rounds');
    }

    public function sponsor(){
        return $this->hasMany('Sponsor');
    }

    public function club(){
        return $this->belongsTo('Club');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

    public function photos(){
        return $this->morphMany('Photo', 'imageable');
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
}
