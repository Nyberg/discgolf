<?php

class CompareItems extends \Eloquent {
	protected $fillable = [];
    protected $table = 'compare_items';

    public function compare(){
        return $this->belongsTo('Compare');
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function round(){
        return $this->belongsTo('Round');
    }
}