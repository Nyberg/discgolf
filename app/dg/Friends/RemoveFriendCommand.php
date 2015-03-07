<?php


namespace dg\Friends;

class RemoveFriendCommand
{
    public $id;


    public function __construct($id){

        $this->id = $id;

    }


}