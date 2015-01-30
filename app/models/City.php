<?php

class City extends \Eloquent {
	protected $fillable = [];
	protected $table = 'cities';

    public function courses(){
        return $this->belongsToMany('Course');
    }

    public function profile(){
        return $this->belongsToMany('Profile');
    }

    public function club(){
        return $this->belongsToMany('Club');
    }
}