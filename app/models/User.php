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


    public function newNotification()
    {
        $notification = new Notification;
        $notification->user()->associate($this);
        return $notification;
    }


    public function notifications()
    {
        return $this->hasMany('Notification');
    }

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
        return $this->hasMany('Round');
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

    public function groups()
    {
        return $this->hasMany('ForumGroup', 'author_id');
    }
    public function categories()
    {
        return $this->hasMany('ForumCategory', 'author_id');
    }
    public function threads()
    {
        return $this->hasMany('ForumThread', 'author_id');
    }
    public function forumcomments()
    {
        return $this->hasMany('ForumComment', 'author_id');
    }

    public function membership(){
        return $this->hasMany('Request');
    }

    public function losts(){
        return $this->hasMany('Lost');
    }

    public function bags(){
        return $this->hasMany('Bag');
    }

    public function friends(){
        return $this->hasMany('Friend', 'user_id');
    }

}
