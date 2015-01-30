<?php


class Profile extends Eloquent{

    protected $table = 'profiles';
    protected $fillable = ['phone', 'info', 'adress', 'image'];
    protected $timestamp = false;


    public function User(){
        return $this->belongsTo('User');
    }

    public function country(){
        return $this->belongsTo('Country');
    }

    public function state(){
        return $this->belongsTo('State');
    }

    public function city(){
        return $this->belongsTo('City');
    }

}