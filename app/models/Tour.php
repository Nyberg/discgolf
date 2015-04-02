<?php

use dg\Eventing\EventGenerator;
use dg\Tours\TourWasPosted;
use dg\Tours\TourWasRemoved;
use dg\Tours\TourWasUpdated;

class Tour extends Eloquent {
	protected $fillable = [];
    protected $table = 'tours';

    use EventGenerator;

    public function post($name, $rounds, $date, $information, $club_id, $country_id, $state_id, $city_id){

        $this->name = $name;
        $this->rounds = $rounds;
        $this->date = $date;
        $this->information = $information;
        $this->club_id = $club_id;
        $this->country_id = $country_id;
        $this->state_id = $state_id;
        $this->city_id = $city_id;

        $this->save();

        $this->raise(new TourWasPosted($this));

        return $this;
    }

    public function change($id, $name, $rounds, $date, $club_id, $information){

        $this->id = $id;
        $this->name = $name;
        $this->rounds = $rounds;
        $this->date = $date;
        $this->information = $information;
        $this->club_id = $club_id;

        $this->save();

        $this->raise(new TourWasUpdated($this));

        return $this;

    }

    public function remove($id){

        $tour = Tour::whereId($id)->first();
        $tour->delete();

        $this->raise(new TourWasRemoved($this));

        return $this;
    }

    public function users(){
        return $this->hasMany('User');
    }

    public function courses(){
        return $this->hasMany('Course');
    }

    public function tees(){
        return $this->hasMany('Tee');
    }

    public function club(){
        return $this->belongsTo('Club');
    }

    public function rounds(){
        return $this->hasMany('Round');
    }
}