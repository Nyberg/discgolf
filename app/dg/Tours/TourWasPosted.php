<?php

namespace dg\Tours;

use Tour;

class TourWasPosted{

    public $tour;

    function __construct(Tour $tour){

        $this->tour = $tour;
    }
}