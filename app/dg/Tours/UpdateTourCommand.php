<?php

namespace dg\Tours;

class UpdateTourCommand
{
    public $id;
    public $name;
    public $rounds;
    public $date;
    public $information;
    public $club_id;

    public function __construct($id, $name, $rounds, $date, $club_id, $information){

        $this->id = $id;
        $this->name = $name;
        $this->rounds = $rounds;
        $this->date = $date;
        $this->club_id = $club_id;
        $this->information = $information;
    }


}