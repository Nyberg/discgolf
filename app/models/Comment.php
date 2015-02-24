<?php

use dg\Comments\CommentWasPosted;
use dg\Comments\CommentWasRemoved;
use dg\Comments\CommentWasUpdated;
use dg\Eventing\EventGenerator;

class Comment extends Eloquent
{

    use EventGenerator;

    protected $table = 'comments';
    protected $fillable = ['body'];

    public function commentable(){
        return $this->morphTo();
    }

    public function users(){
        return $this->belongsTo('User', 'user_id');
    }

    public function post($body, $type_id, $user_id, $type){

        $this->body = $body;
        $this->commentable_id = $type_id;
        $this->user_id = $user_id;
        $this->commentable_type = $type;

        $this->save();

        $this->raise(new CommentWasPosted($this));

        return $this;

    }

    public function change($body)
    {
        $this->body = $body;

        $this->save();

        $this->raise(new CommentWasUpdated($this));

        return $this;
    }

    public function remove($id){

        $comment = Comment::whereId($id)->firstOrFail();
        $comment->delete();

        $this->raise(new CommentWasRemoved($this));

        return $this;

    }

}