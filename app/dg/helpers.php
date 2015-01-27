<?php

function errors_for($attribute, $errors){

    return $errors->first($attribute, '<br/><div class="alert alert-danger col-md-8"><b>Oh snap!</b> :message</div>');

}

function getParPlayer($par_id, $show, $user_id){

    if($par_id == $show){

            $user = User::whereId($user_id)->firstOrFail();

            return '<a href="/user/'.$user->id.'/show">'.$user->first_name . ' ' . $user->last_name . '</a>';

    }else{
        $user = User::whereId($par_id)->firstOrFail();

        return '<a href="/user/'.$user->id.'/show">'.$user->first_name . ' ' . $user->last_name . '</a>';
    }

}

function showPar($par_id, $user_id){

    $user1 = User::whereId($par_id)->firstOrFail();
    $user2 = User::whereId($user_id)->firstOrFail();

    return '<a href="/user/'.$user2->id.'/show">'.$user2->first_name . ' ' . $user2->last_name.'</a> & <a href="/user/'.$user1->id.'/show">'.$user1->first_name . ' '.$user1->last_name.'</a>';

}

function checkScore($id, $par){

    $sum = $id - $par;

    if($sum == -3){
        return 'hole-in-one';
    }
    if($sum == -2){
        return 'hole-in-one';
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
    return $score . ' (' . $sum. ') ';

}

function calcRecord($total, $par){

    if($total == 0){
        return '-';
    }

    $sum = $total - $par;
    return $total . ' ('.$sum.')';

}

function convert($length){

    if(!Auth::user()){
        return $length . ' m';
    }
    if(Auth::user()->metric != 'f'){
        return $length . ' m';
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

function getPie($data)
{ /*

    $pie =
        '
        var pieData = [
{
value: ' . $data['ace'] . ',
color:"#dff0d8",
highlight: "#59FF5F",
label: "Ace"
},
{
value: ' . $data['albatross'] . ',
color: "#fcf8e3",
highlight: "#5AD3D1",
label: "Albatross"
},
{
value: ' . $data['eagle'] . ',
color: "#FDB45C",
highlight: "#FFC870",
label: "Eagle"
},
{
value: ' . $data['birdie'] . ',
color: "#949FB1",
highlight: "#A8B3C5",
label: "Birdie"
},
{
value: ' . $data['par'] . ',
color: "#4D5360",
highlight: "#616774",
label: "Par"
},
{
value: ' . $data['bogey'] . ',
color: "#000",
highlight: "#616774",
label: "Bogey"
},
{
value: ' . $data['dblbogey'] . ',
color: "#ddd",
highlight: "#616774",
label: "Double Bogey"
},
{
value: ' . $data['trpbogey'] . ',
color: "#eee",
highlight: "#616774",
label: "Triple Bogey"
}

];

window.onload = function(){
var ctx = document.getElementById("chart-pie").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);

};';

    return $pie;
 */
}

function getBar($data){

$bar =
'var ace = function(){ return '.$data['ace'].'};
var albatross = function(){ return '.$data['albatross'].'};
var eagle = function(){ return '.$data['eagle'].'};
var birdie = function(){ return '.$data['birdie'].'};
var par = function(){ return '.$data['par'].'};
var bogey = function(){ return '.$data['bogey'].'};
var dblbogey = function(){ return '.$data['dblbogey'].'};
var trpbogey = function(){ return '.$data['trpbogey'].'};
var quad = function(){ return '.$data['ace'].'};

var barChartData = {
labels : ["Ace","Albatross","Eagle","Birdie","Par","Bogey","Dubbel Bogey", "Trippel Bogey", "Quad Bogey"],
datasets : [
{
fillColor : "rgba(151,187,205,0.5)",
strokeColor : "rgba(151,187,205,0.8)",
highlightFill : "rgba(151,187,205,0.75)",
highlightStroke : "rgba(151,187,205,1)",
data : [ace(),albatross(),eagle(),birdie(),par(),bogey(),dblbogey(), trpbogey(), quad()]
}
]

}
window.onload = function(){
var ctx = document.getElementById("canvas").getContext("2d");
window.myBar = new Chart(ctx).Bar(barChartData, {
responsive : true
});
}';


return $bar;

}