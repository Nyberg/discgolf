<?php

class Registration extends \Eloquent {
	protected $fillable = [];

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

    public function activation(){
        return $this->hasOne('Activation', 'user_id');
    }

}