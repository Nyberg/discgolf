<?php
class ForumComment extends Eloquent
{
    protected $table = 'forum_comments';
    protected $fillable = ['body', 'author_id', 'group_id', 'category_id'];
    protected $touches = ['thread'];
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
    public function thread()
    {
        return $this->belongsTo('ForumThread');
    }
}