<?php

class Wind extends \Eloquent {
	protected $fillable = [];
    protected $table = 'winds';

    public function round(){
        return $this->hasMany('Round');
    }
}