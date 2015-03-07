<?php

class Activation extends \Eloquent {
	protected $fillable = [];
    protected $table = 'activations';


    public function user(){
        return $this->belongsTo('User');
    }

}