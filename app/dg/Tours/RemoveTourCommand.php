<?php

namespace dg\Tours;

class RemoveTourCommand
{
    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

}