<?php

class Review extends \Eloquent {
	protected $fillable = [];

    public function course(){
        return $this->belongsTo('Course');
    }


}