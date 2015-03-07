<?php

namespace dg\Reviews;

use Review;

class ReviewWasPosted{

    public $review;

    function __construct(Review $review){

        $this->review = $review;
    }

}