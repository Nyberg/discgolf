<?php

namespace dg\Friends;

use Friend;

class FriendWasPosted{

    public $friend;

    function __construct(Friend $friend){

        $this->friend = $friend;
    }

}