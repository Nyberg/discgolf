<?php

namespace dg\Rounds;

class RemoveRoundCommand
{
    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

}