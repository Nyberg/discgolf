<?php

use dg\Eventing\EventGenerator;
use dg\Records\RecordWasPosted;

class Record extends \Eloquent {
	protected $fillable = [];
    protected $table = 'records';

    use EventGenerator;


    public function post($user_id, $course_id, $tee_id, $type, $total, $date, $par_id, $round_id, $status, $group_id){

        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->tee_id = $tee_id;
        $this->type = $type;
        $this->total = $total;
        $this->date = $date;
        $this->type_id = $par_id;
        $this->round_id = $round_id;
        $this->status = $status;
        $this->group_id = $group_id;

        $this->save();

        $this->raise(new RecordWasPosted($this));

        return $this;

    }

    public function course(){
        return $this->belongsTo('Course');
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function tee(){
        return $this->belongsTo('Tee');
    }

    public function round(){
        return $this->belongsTo('Round');
    }

    public function hole(){
        return $this->belongsToMany('Hole');
    }

     public function scores(){
        return $this->hasMany('Score', 'round_id');
    }
}