<?php


namespace dg\Records;

class PostRecordsCommand
{
    public $user_id;
    public $course_id;
    public $tee_id;
    public $type;
    public $total;
    public $date;
    public $par_id;
    public $round_id;
    public $status;
    public $group_id;


public function __construct($user_id, $course_id, $tee_id, $type, $total, $date, $par_id, $round_id, $status, $group_id){

    $this->user_id = $user_id;
    $this->course_id = $course_id;
    $this->tee_id = $tee_id;
    $this->type = $type;
    $this->total = $total;
    $this->date = $date;
    $this->par_id = $par_id;
    $this->round_id = $round_id;
    $this->status = $status;
    $this->group_id = $group_id;

    }


}