<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public function users(){
        return $this->hasMany('User');
    }

}