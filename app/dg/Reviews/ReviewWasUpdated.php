<?php

namespace dg\Reviews;

use Review;

class ReviewWasUpdated{

    public $review;

    function __construct(Review $review){

        $this->review = $review;
    }

}