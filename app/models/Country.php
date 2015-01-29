<?php

class Country extends \Eloquent {
	protected $fillable = [];
    protected $table = 'countries';

    public function courses(){
        return $this->belongsToMany('Course');
    }

}