<?php

class State extends \Eloquent {
	protected $fillable = [];
	protected $table = 'states';

    public function courses(){
        return $this->belongsToMany('Course');
    }

}