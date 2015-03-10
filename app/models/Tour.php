<?php

class Tour extends Eloquent {
	protected $fillable = [];
    protected $table = 'tours';

    public function users(){
        return $this->hasMany('User');
    }

    public function courses(){
        return $this->hasMany('Course');
    }

    public function tees(){
        return $this->hasMany('Tee');
    }

    public function club(){
        return $this->belongsTo('Club');
    }

    public function rounds(){
        return $this->hasMany('Round');
    }
}