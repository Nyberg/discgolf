<?php

namespace dg\Rounds;

use Round;

class RoundWasPosted{

    public $round;

    function __construct(Round $round){

        $this->round = $round;
    }

}