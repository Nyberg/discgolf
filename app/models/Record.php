<?php

class Record extends \Eloquent {
	protected $fillable = [];
    protected $table = 'records';

    public function course(){
        return $this->belongsTo('Course');
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function tee(){
        return $this->belongsTo('Tee');
    }

    public function round(){
        return $this->belongsTo('Round');
    }

    public function hole(){
        return $this->belongsToMany('Hole');
    }

     public function scores(){
        return $this->hasMany('Score', 'round_id');
    }
}