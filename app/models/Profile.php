<?php


class Profile extends Eloquent{

    protected $table = 'profiles';
    protected $fillable = ['phone', 'info', 'adress', 'image'];
    protected $timestamp = false;


    public function User(){
        return $this->belongsTo('User');
    }

}