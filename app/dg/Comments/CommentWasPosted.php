<?php

namespace dg\Comments;

use Comment;

class CommentWasPosted{

    public $comment;

    function __construct(Comment $comment){

        $this->comment = $comment;
    }

}