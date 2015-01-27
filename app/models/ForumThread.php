<?php
class ForumThread extends Eloquent
{
    protected $table = 'forum_threads';
    protected $fillable = ['title', 'body', 'group_id', 'category_id', 'author_id'];
    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }
    public function group()
    {
        return $this->belongsTo('ForumGroup');
    }
    public function category()
    {
        return $this->belongsTo('ForumCategory');
    }
    public function comments()
    {
        return $this->hasMany('ForumComment', 'thread_id');
    }
}