<?php

namespace dg\Tours;

use Tour;

class TourWasRemoved{

    public $tour;

    function __construct(Tour $tour){

        $this->tour = $tour;
    }
}