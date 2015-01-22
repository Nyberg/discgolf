<?php

use Intervention\Image\ImageManager;

class Photo extends Eloquent {

    public function imageable(){
        return $this->morphTo();
    }

}