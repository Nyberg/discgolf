<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');


    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function profile()
    {
    return $this->HasOne('Profile');
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
}
