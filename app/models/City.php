<?php

class City extends \Eloquent {
	protected $fillable = [];
	protected $table = 'cities';

    public function courses(){
        return $this->belongsToMany('Course');
    }

}