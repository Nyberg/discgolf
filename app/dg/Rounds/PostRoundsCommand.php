<?php


namespace dg\Rounds;

class PostRoundsCommand
{
    public $user_id;
    public $course_id;
    public $tee_id;
    public $date;
    public $status;
    public $type;
    public $par_id;
    public $username;
    public $comment;


    public function __construct($user_id, $course_id, $tee_id, $date, $status, $type, $par_id, $username, $comment){

        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->tee_id = $tee_id;
        $this->date = $date;
        $this->status = $status;
        $this->type = $type;
        $this->par_id = $par_id;
        $this->username = $username;
        $this->comment = $comment;


    }


}