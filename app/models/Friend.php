<?php

use dg\Eventing\EventGenerator;
use dg\Friends\FriendWasPosted;
use dg\Friends\FriendWasRemoved;

class Friend extends Eloquent {

    protected $table = 'friends';
    protected $fillable = ['user_id', 'friend_id'];

    use EventGenerator;

    public function post($user_id, $friend_id){

        $this->user_id = $user_id;
        $this->friend_id = $friend_id;

        $this->save();

        $this->raise(new FriendWasPosted($this));

        return $this;

    }

    public function remove($id){
        $friend = Friend::whereId($id)->firstOrFail();

        $friend->delete();

        $this->raise(new FriendWasRemoved($this));

        return $this;

    }

    public function user(){
        return $this->belongsTo('User');
    }

}