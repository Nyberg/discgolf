<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Score extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'scores';
    protected $fillable = ['score'];

    public function hole(){
        return $this->belongsTo('Hole');
    }

    public function round(){
        return $this->belongsTo('Round');
    }

    public function shot(){
        return $this->hasMany('Shot');
    }

    public function comments(){
        return $this->morphMany('Comment', 'commentable');
    }

    public function user(){
        return $this->belongsTo('User');
    }

   /* public function record(){
        return $this->belongsTo('Record');
    }
*/

}
