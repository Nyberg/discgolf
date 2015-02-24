<?php

namespace dg\Rounds;

use Round;

class RoundWasUpdated{

    public $round;

    function __construct(Round $round){

        $this->round = $round;
    }

}