<?php
class ForumGroup extends Eloquent
{
    protected $table = 'forum_groups';
    protected $fillable = ['title','desc', 'author_id'];
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function categories()
    {
        return $this->hasMany('ForumCategory', 'group_id');
    }
    public function threads()
    {
        return $this->hasMany('ForumThread', 'group_id');
    }
    public function comments()
    {
        return $this->hasMany('ForumComment', 'group_id');
    }
}