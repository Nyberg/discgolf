<?php
class ForumCategory extends Eloquent
{
    protected $table = 'forum_categories';
    protected $fillable = ['title', 'group_id', 'author_id'];
    public function group()
    {
        return $this->belongsTo('ForumGroup');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function threads()
    {
        return $this->hasMany('ForumThread', 'category_id');
    }
    public function comments()
    {
        return $this->hasMany('ForumComment', 'category_id');
    }
}