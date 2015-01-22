<?php
class Comment extends Eloquent
{

    protected $table = 'comments';
    protected $fillable = ['body'];

    public function commentable(){
        return $this->morphTo();
    }
}