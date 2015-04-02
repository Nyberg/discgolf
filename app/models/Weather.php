<?php

class Weather extends \Eloquent {
	protected $fillable = [];
    protected $table = 'weathers';

    public function round(){
        return $this->hasMany('Round');
    }
}