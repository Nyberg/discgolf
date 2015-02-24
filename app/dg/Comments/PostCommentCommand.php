<?php


namespace dg\Comments;

    class PostCommentCommand
    {
        public $body;
        public $type_id;
        public $user_id;
        public $type;


    public function __construct($body, $type_id, $user_id, $type){

        $this->body = $body;
        $this->type_id = $type_id;
        $this->user_id = $user_id;
        $this->type = $type;


    }


    }