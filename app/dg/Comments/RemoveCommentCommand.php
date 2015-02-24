<?php

namespace dg\Comments;

class RemoveCommentCommand
{
    public $id;

    function __construct($id)
    {
        $this->id = $id;
    }

}