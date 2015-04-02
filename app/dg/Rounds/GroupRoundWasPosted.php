<?php

namespace dg\Rounds;

use Round;

class GroupRoundWasPosted{

    public $round;

    function __construct(Round $round){

        $this->round = $round;
    }

}