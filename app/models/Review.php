<?php

use dg\Eventing\EventGenerator;
use dg\Reviews\ReviewWasPosted;
use dg\Reviews\ReviewWasRemoved;
use dg\Reviews\ReviewWasUpdated;

class Review extends Eloquent {
	protected $fillable = ['user_id', 'course_id', 'heading', 'body', 'rating'];

    use EventGenerator;

    public function post($user_id, $course_id, $heading, $body, $rating){

        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->head = $heading;
        $this->body = $body;
        $this->rating = $rating;

        $this->save();

        $this->raise(new ReviewWasPosted($this));

        return $this;

    }

    public function change($user_id, $course_id, $body, $head, $rating){

        $this->user_id = $user_id;
        $this->course_id = $course_id;
        $this->body = $body;
        $this->head = $head;
        $this->rating = $rating;

        $this->save();

        $this->raise(new ReviewWasUpdated($this));

        return $this;
    }

    public function remove($id){

        $review = Review::whereId($id)->first();
        $review->delete();

        $this->raise(new ReviewWasRemoved($this));

        return $this;

    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function course(){
        return $this->belongsTo('Course');
    }


}