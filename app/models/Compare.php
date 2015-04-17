<?php

class Compare extends \Eloquent {
	protected $fillable = [];
    protected $table = 'compares';

    public function user(){
        return $this->belongsTo('User');
    }

    public function items(){
        return $this->hasMany('CompareItems');
    }

}