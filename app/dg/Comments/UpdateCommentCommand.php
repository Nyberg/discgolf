<?php

namespace dg\Comments;

class UpdateCommentCommand{

    public $id;
    public $body;

    function __construct($id, $body){
        $this->id = $id;
        $this->body = $body;
    }
}