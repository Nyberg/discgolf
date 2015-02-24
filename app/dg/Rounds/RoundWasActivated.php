<?php

namespace dg\Rounds;

use Round;

class RoundWasActivated{

    public $round;

    function __construct(Round $round){

        $this->round = $round;
    }

}