<?php

use dg\Eventing\EventGenerator;
use dg\Rounds\GroupRoundWasPosted;
use dg\Rounds\RoundWasActivated;
use dg\Rounds\RoundWasPosted;
use dg\Rounds\RoundWasRemoved;
use dg\Rounds\RoundWasUpdated;

class Round extends Eloquent{

    protected $table = 'rounds';
    protected $fillable = ['course_id', 'user_id', 'comment', 'tee_id', 'type', 'date', 'type_id', 'status', 'username', 'group_id'];

    use EventGenerator;

    public function post($user_id, $course_id, $tee_id, $date, $status, $type, $type_id, $username, $comment, $group_id, $weather_id, $wind_id){

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

        $this->save();

        $this->raise(new RoundWasPosted($this));

        return $this;

    }

    public function postGroupRound($user_id, $course_id, $tee_id, $date, $status, $type, $type_id, $username, $comment, $group_id, $weather_id, $wind_id){

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

        $this->save();

        $this->raise(new GroupRoundWasPosted($this));

        return $this;

    }

    public function change($comment){

        $this->comment = $comment;

        $this->save();

        $this->raise(new RoundWasUpdated($this));

        return $this;

    }

    public function remove($id){

        $round = Round::whereId($id)->firstOrFail();

        $scores = Score::where('round_id', $id)->get();

         foreach($scores as $score){
             $score->delete();
         }

        $round->delete();

        $this->raise(new RoundWasRemoved($this));

        return $this;

    }

    public function setActive($id){

        $round = Round::whereId($id)->firstOrFail();

        $round->status = 1;
        $round->save();

        $this->raise(new RoundWasActivated($this));

        return $this;

    }

    public function tee()
    {
        return $this->belongsTo('Tee');
    }

    public function tour(){
        return $this->belongsTo('Tour');
    }

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function score(){
        return $this->hasMany('Score');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

    public function record(){
        return $this->belongsTo('Record');
    }

    public function group(){
        return $this->belongsTo('GroupRound');
    }

    public function weather(){
        return $this->belongsTo('Weather');
    }

    public function wind(){
        return $this->belongsTo('Wind');
    }

    public function compare(){
        return $this->belongsTo('Compare', 'id');
    }
}
