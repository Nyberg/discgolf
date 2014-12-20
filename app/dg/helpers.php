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
    if($sum >= 2){
        return 'danger';
    }
}

function calcScore($score, $total){

    $sum = $score - $total;
    return 'Score: ' . $score . ' (' . $sum. ') ';

}

function convert($length){

    if(!Auth::user()){
        return $length . 'm';
    }
    if(Auth::user()->metric != 'f'){
        return $length . 'm';
    }else{
        $sum = $length * 3.280;
        return round($sum, 0) . ' ft';
    }
}

function getStatus($status){
    if($status == 0){
        return 'Inactive';
    }else{
        return 'Active';
    }
}

function checkShot($score_added){

    if($score_added == 0){
        return 'add';
    }else{
        return 'edit';
    }

}

function setIcon($score_added){

    if($score_added == 0){
        return 'plus';
    }else{
        return 'pencil';
    }

}

function checkFee($fee){
    if($fee == null || '0'){
        return 'Free to play!';
    }else{
        return 'Fee: ' . $fee;
    }
}