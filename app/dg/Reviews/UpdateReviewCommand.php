<?php

namespace dg\Reviews;

class UpdateReviewCommand
{
    public $id;
    public $user_id;
    public $course_id;
    public $body;
    public $head;
    public $rating;


    public function __construct($id, $user_id, $course_id, $body, $head, $rating){

        $this->id = $id;
        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->body = $body;
        $this->head = $head;

        $this->rating = $rating;

    }
}