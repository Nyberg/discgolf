<?php

namespace dg\Reviews;

class RemoveReviewsCommand
{
    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

}