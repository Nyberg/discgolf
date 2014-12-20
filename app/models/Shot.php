<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Shot extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'shots';
    protected $fillable = ['course_id', 'user_id', 'comment', 'disc', 'x', 'y'];

    public function hole()
    {
        return $this->belongsTo('Hole');
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function score(){
        return $this->belongsTo('Score');
    }

    public function disc(){
        return $this->belongsTo('Disc');
    }

}
