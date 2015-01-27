<?php

class Tee extends \Eloquent {
	protected $fillable = [];


    public function course(){
        return $this->belongsTo('Course');
    }

    public function club(){
        return $this->belongsTo('Club');
    }

    public function round(){
        return $this->hasMany('Round');
    }

    public function hole(){
        return $this->hasMany('Hole');
    }


}