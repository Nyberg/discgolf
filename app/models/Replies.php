<?php

class Replies extends \Eloquent {
	protected $fillable = [];
    protected $table = 'replies';

    public function comment(){
        return $this->belongsTo('Comment');
    }


}