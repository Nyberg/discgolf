<?php

namespace dg\Rounds;

class UpdateRoundCommand
{
    public $id;
    public $comment;

    public function __construct($id, $comment){

        $this->id = $id;
        $this->comment = $comment;

    }


}