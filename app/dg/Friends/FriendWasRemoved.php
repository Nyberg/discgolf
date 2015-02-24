<?php

namespace dg\Friends;

use Friend;

class FriendWasRemoved{

    public $friend;

    function __construct(Friend $friend){

        $this->friend = $friend;
    }

}