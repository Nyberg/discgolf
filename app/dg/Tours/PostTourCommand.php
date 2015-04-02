<?php


namespace dg\Tours;

class PostTourCommand
{
    public $name;
    public $rounds;
    public $date;
    public $information;
    public $club_id;
    public $country_id;
    public $state_id;
    public $city_id;


    public function __construct($name, $rounds, $date, $information, $club_id, $country_id, $state_id, $city_id){

        $this->name = $name;
        $this->rounds = $rounds;
        $this->date = $date;
        $this->information = $information;
        $this->club_id = $club_id;
        $this->country_id = $country_id;
        $this->state_id = $state_id;
        $this->city_id = $city_id;
    }


}