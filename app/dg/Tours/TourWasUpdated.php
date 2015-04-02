<?php

namespace dg\Tours;

use Tour;

class TourWasUpdated{

    public $tour;

    function __construct(Tour $tour){

        $this->tour = $tour;
    }
}