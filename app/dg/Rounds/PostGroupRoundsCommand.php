<?php


namespace dg\Rounds;

class PostGroupRoundsCommand
{
    public $user_id;
    public $course_id;
    public $tee_id;
    public $date;
    public $status;
    public $type;
    public $type_id;
    public $username;
    public $comment;
    public $group_id;
    public $weather_id;
    public $wind_id;


    public function __construct($user_id, $course_id, $tee_id, $date, $status, $type, $type_id, $username, $comment, $group_id, $weather_id, $wind_id){

        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->tee_id = $tee_id;
        $this->date = $date;
        $this->status = $status;
        $this->type = $type;
        $this->type_id = $type_id;
        $this->username = $username;
        $this->comment = $comment;
        $this->group_id = $group_id;
        $this->weather_id = $weather_id;
        $this->wind_id = $wind_id;

    }


}