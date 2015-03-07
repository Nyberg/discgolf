<?php


namespace dg\Reviews;

class PostReviewCommand
{
    public $user_id;
    public $course_id;
    public $heading;
    public $body;
    public $rating;


    public function __construct($user_id, $course_id, $heading, $body, $rating){

        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->heading = $heading;
        $this->body = $body;
        $this->rating = $rating;

    }


}