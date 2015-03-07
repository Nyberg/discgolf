<?php

use dg\Eventing\EventGenerator;
use dg\Registrations\RegistrationWasPosted;

class Registration extends \Eloquent {
	protected $fillable = [];

    protected $hidden = array('password', 'remember_token');

    use EventGenerator;

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function store($first_name, $last_name, $password, $email, $image, $club_id, $activated){

        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
        $this->club_id = $club_id;
        $this->activated = $activated;

        $this->save();

        $this->raise(new RegistrationWasPosted($this));

        return $this;

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