<?php

namespace dg\Reviews;

use Review;

class ReviewWasRemoved{

    public $review;

    function __construct(Review $review){

        $this->review = $review;
    }

}