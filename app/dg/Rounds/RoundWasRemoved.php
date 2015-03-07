<?php

namespace dg\Rounds;

use Round;

class RoundWasRemoved{

    public $round;

    function __construct(Round $round){

        $this->round = $round;
    }

}