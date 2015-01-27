<?php

class Club extends Eloquent {

    protected $table = 'clubs';
    protected $fillable = ['name', 'website', 'country', 'state', 'par'];

    public function user(){
        return $this->hasMany('User');
    }

    public function course(){
        return $this->hasMany('Course');
    }

    public function tee(){
        return $this->hasMany('Tee');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

    public function photos(){
        return $this->morphMany('Photo', 'imageable');
    }

    public function categories(){
        return $this->hasMany('ForumCategory', 'group_id');
    }

}
