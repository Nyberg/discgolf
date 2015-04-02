<?php

function errors_for($attribute, $errors)
{

    return $errors->first($attribute, '<br/><div class="alert alert-danger col-md-8"><b>Oh snap!</b> :message</div>');

}

function getFriend($id, $user_id){

    $friends = Friend::where('user_id', $id)->get();
    $check = false;

    foreach($friends as $friend){

        if($friend->friend_id == $user_id){
            return $check = true;
        }

    }

    return $check;

}

function getParPlayer($type_id, $show, $user_id){

    if($type_id == $show){

            $user = User::whereId($user_id)->firstOrFail();

            return '<a href="/user/'.$user->id.'/show">'.$user->first_name . ' ' . $user->last_name . '</a>';

    }else{
        $user = User::whereId($type_id)->firstOrFail();

        return '<a href="/user/'.$user->id.'/show">'.$user->first_name . ' ' . $user->last_name . '</a>';
    }

}

function showPar($type_id, $user_id){

    $user1 = User::whereId($type_id)->firstOrFail();
    $user2 = User::whereId($user_id)->firstOrFail();

    return '<a href="/user/'.$user2->id.'/show">'.$user2->first_name . ' ' . $user2->last_name.'</a> & <a href="/user/'.$user1->id.'/show">'.$user1->first_name . ' '.$user1->last_name.'</a>';

}

function checkScore($id, $par){

    $sum = $id - $par;

    if($par == 4){

        if($sum == -3){
            return 'hole-in-one';
        }
        if($sum == -2){
            return 'eagle';
        }
        if($sum == -1){
            return 'birdie';
        }
        if($sum == 0){
            return '';
        }
        if($sum == 1){
            return 'bogey';
        }
        if($sum == 2){
            return 'dblbogey';
        }
        if($sum == 3){
            return 'trpbogey';
        }
        if($sum == 4){
            return 'quad';
        }

    }if($par == 3){

        if($sum == -2){
            return 'hole-in-one';
        }
        if($sum == -1){
            return 'birdie';
        }
        if($sum == 0){
            return '';
        }
        if($sum == 1){
            return 'bogey';
        }
        if($sum == 2){
            return 'dblbogey';
        }
        if($sum == 3){
            return 'trpbogey';
        }
        if($sum == 4){
            return 'quad';
        }
    }
}

function calcScore($score, $total){

    $sum = $score - $total;
    return $score . ' (' . $sum. ') ';

}

function calcRecord($total, $par, $id, $course_id){

    if($total == 0){
        return '-';
    }

    $sum = $total - $par;
    return '<a href="/round/'.$id.'/course/'.$course_id.'/" class="record-a">'.$total . ' ('.$sum.')'.'</a>';

}

function convert($length){

    if(!Auth::user()){
        return round($length) . ' m';
    }
    if(Auth::user()->metric != 'f'){
        return round($length) . ' m';
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

function shotornot($check, $id, $round_id){

    $info = 'Klicka här för att visa mer information';

    if($check == 0){
        return '';
    }else{
        return '<a href="/hole/'.$id.'/score/'.$round_id.'">'.$info.'</a>';
    }

}

function getUser($id){

    $user = User::whereId($id)->firstOrFail();
    return $user->first_name . ' ' . $user->last_name;

}

function getUserImage($id){

    $user = User::whereId($id)->firstOrFail();
    return $user->image;

}

function calcLength($sum){

    if(!Auth::user()){
        return $sum . 'm';
    }
    if(Auth::user()->metric != 'f'){
        return $sum . 'm';
    }else{
        $sum = $sum * 3.280;
        return round($sum, 0) . ' ft';
    }
}
