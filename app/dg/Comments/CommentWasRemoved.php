<?php

namespace dg\Comments;

use Comment;

class CommentWasRemoved{

    public $comment;

    function __construct(Comment $comment){

        $this->comment = $comment;
    }

}