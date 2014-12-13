<?php

function errors_for($attribute, $errors){

    return $errors->first($attribute, '<span class="text-danger">:message</span>');

}

function checkScore($id, $par){

    $sum = $id - $par;

    if($sum == -3){
        return 'success';
    }
    if($sum == -2){
        return 'success';
    }
    if($sum == -1){
        return 'success';
    }
    if($sum == 0){
        return '';
    }
    if($sum == 1){
        return 'warning';
    }
    if($sum == 2){
        return 'danger';
    }
}

function calcScore($score, $total){

    $sum = $score - $total;
    return 'Score: ' . $score . ' (' . $sum. ') ';

}

function convert($length){

    if(Auth::User()->metric != 'f'){
        return $length . 'm';
    }else{
        $sum = $length * 3.280;
        return round($sum, 0) . ' ft';
    }
}
