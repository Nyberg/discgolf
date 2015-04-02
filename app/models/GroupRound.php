<?php

class GroupRound extends \Eloquent {
	protected $fillable = [];
    protected $table = 'groups';

    public function rounds(){
        return $this->hasMany('Round', 'group_id');
    }

}