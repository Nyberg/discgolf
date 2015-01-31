<?php

class Lost extends \Eloquent {
	protected $fillable = [];
    protected $table = 'losts';

    public function user(){
        return $this->belongsTo('User');
    }

    public function course(){
        return $this->belongsTo('Course');
    }
}