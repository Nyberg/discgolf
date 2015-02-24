<?php


namespace dg\Friends;

class PostFriendCommand
{
    public $user_id;
    public $friend_id;


    public function __construct($user_id, $friend_id){

        $this->user_id = $user_id;
        $this->friend_id = $friend_id;

    }

}