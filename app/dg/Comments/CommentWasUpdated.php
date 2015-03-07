<?php

namespace dg\Comments;

use Comment;

class CommentWasUpdated{

    public $comment;

    function __construct(Comment $comment){

        $this->comment = $comment;
    }

}