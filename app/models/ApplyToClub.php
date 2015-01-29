<?php

class ApplyToClub extends \Eloquent {
	protected $fillable = [];

    public function users(){
        return $this->belongsTo('User');
    }

    public function clubs(){
        return $this->belongsTo('Club');
    }

}