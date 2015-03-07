<?php

namespace dg\statistics;

use User;
use Illuminate\Database\Eloquent;

class Stat {

    public function getBirdies($rounds){

        $sum = count($rounds);
        $results = [];
        $data = [];
        $i = 0;

        while($i < $sum){
            $results[$i][0] = 0;
            $data[$i] = ['ace'=>0, 'albatross'=>0, 'eagle'=>0, 'birdie'=>0,'par'=>0, 'bogey'=>0, 'dblbogey'=>0, 'trpbogey'=>0, 'quad'=>0];
            $i++;
        }

        $h = 0;
        foreach($rounds as $round){

            foreach($round->score as $score){

              $results[$h][] = $this->checkScore($score->score, $score->par);

            }
            $h++;
        }

        for($j=0; $j<$sum; $j++){

            foreach($results[$j] as $result){

                switch($result){
                    case 'ace':
                        $data[$j]['ace']++;
                        break;
                    case 'albatross':
                        $data[$j]['albatross']++;
                        break;
                    case 'eagle':
                        $data[$j]['eagle']++;
                        break;
                    case 'birdie':
                        $data[$j]['birdie']++;
                        break;
                    case 'par':
                        $data[$j]['par']++;
                        break;
                    case 'bogey':
                        $data[$j]['bogey']++;
                        break;
                    case 'dblbogey':
                        $data[$j]['dblbogey']++;
                        break;
                    case 'trpbogey':
                        $data[$j]['trpbogey']++;
                        break;
                    case 'quad':
                        $data[$j]['quad']++;
                        break;
                    }
                }
            }

        $birdies = 0;
        for($k=0; $k<$sum; $k++){
            if($data[$k]['birdie'] > $birdies){
                $birdies = $data[$k]['birdie'];
            }else{

            }
        }

        return $birdies;
    }

    public function getAvg($scores, $rounds){

        $total = 0;
        $num = count($rounds);

        foreach($scores as $score){
            $total = $total + $this->getScore($score->score, $score->par);
        }

       return $avg = $total / $num;
    }

    public function generateAvg($tees){

        $total = 0;
        $rounds = 0;
        $sum = count($tees);
        $dirArray = [];

        $j = 1;

        foreach($tees as $tee){

            $dirArray[$tee->id][] = 0;
            $sum = count($tee->round);
            $k = 1;

            foreach($tee->hole as $hole){
                $avg = 0;
                $total = 0;

                if(count($hole->score) == null){

                    $sum = 1;
                    $total = $hole->par;

                }else{

                foreach($hole->score as $score){
                        $total = $total + $score->score;
                        $rounds++;
                    }
                }

                $avg = $total / $sum;
                $dirArray[$tee->id][$hole->number] = round($avg,1);
                $k++;
            }

            $j++;
        }

        return $dirArray;
    }

    public function generateUserAvg($tee, $rounds){

        $total = 0;
        $num = 0;
        $dirArray = [];
        $total = [];

        foreach($tee->hole as $hole){
            $dirArray[$hole->tee_id][$hole->number] = 0;
            $total[$hole->tee_id][$hole->number] = 0;
        }


        foreach($rounds as $round){

            foreach($round->score as $score){
                $total[$round->tee_id][$score->hole->number] = $total[$round->tee_id][$score->hole->number] + $score->score;
            }
            $num++;
        }

            foreach($tee->hole as $hole) {
                $dirArray[$hole->tee_id][$hole->number] = $total[$hole->tee_id][$hole->number] / $num;
            }

        return $dirArray;
    }

    public function generateBlank($tee){

        $dirArray = [];

        foreach($tee->hole as $hole){
            $dirArray[$hole->tee_id][$hole->number] = 0;
        }

        return $dirArray;

    }
 /*
    public function roundAvg($rounds){

        $stats = ['1'=>0, '2'=>0,'3'=>0,'4'=>0,'5'=>0, 'date-1'=>0, 'date-2'=>0, 'date-3'=>0, 'date-4'=>0, 'date-5'=>0];

        $i = 1;
        foreach($rounds as $round){

            $stats[$i] = $this->getRoundScore($round->total, $round->tee->par);
            $stats['date-'.$i] = $round->date;

        $i++;
        }

        return $stats;

    }

    public function holeAvg($scores){

        $stats = ['1'=>0, '2'=>0,'3'=>0,'4'=>0,'5'=>0, 'date-1'=>0, 'date-2'=>0, 'date-3'=>0, 'date-4'=>0, 'date-5'=>0];

        $i = 1;
        foreach($scores as $score){

            $stats[$i] = $this->getRoundScore($score->score, $score->hole->par);
            $stats['date-'.$i] = $score->round->date;

            $i++;
        }

        return $stats;

    } */

    # Genrererar senaste resultaten #
    public function roundScores($rounds){

        $name = ['name'=>'Resultat'];
        $date = ['date'=>[
        ]];
        $data = ['data'=>[
        ]];
        $i = 1;

        foreach($rounds as $round){

            array_push($data['data'], $this->getRoundScore($round->total, $round->tee->par));
            array_push($date['date'], $round->date);

            $i++;
        }

        $data = [$name, $data, $date];

        return $data;

    }

    # Genererar senaste resultaten på ett hål #
    public function holeScores($scores){

        $name = ['name'=>'Resultat'];
        $date = ['date'=>[
        ]];
        $data = ['data'=>[
        ]];
        $i = 1;

        foreach($scores as $score){

            array_push($data['data'], $score->score - $score->par);
            array_push($date['date'], $score->round->date);

            $i++;
        }

        $data = [$name, $data, $date];

        return $data;
    }

    public function getRoundScore($total, $par){

            $avg = $total - $par;

        return $avg;
    }

    # Genererar resultat för en runda #
    public function generateRound($rounds, $tee){

        $dirArray = [];

        foreach($tee->hole as $hole){
            $dirArray[$hole->number] = 0;
        }

        foreach($rounds->score as $s)
        {
                $dirArray[$s->hole->number]= $s->score;

        }
        return $dirArray;
    }

    public function getAvgScore($scores){

        $total = 0;
        $rounds = 0;
        $num = count($scores);

        $data = ['avg'=>0, 'shots'=>0];

        if(count($scores) == null){
            $total = 9;
            $num = 3;
        }else{

        foreach($scores as $score){
                $total = $total + $score->score;
                $rounds++;
            }

        }

        $avg = $total / $num;
        $data['avg'] = round($avg, 1);
        $data['shots'] = $total;
        $data['rounds'] = $rounds;

        return $data;
    }

    function getScore($score, $total){

        $sum = $score - $total;
        return $sum;

    }

    public function calcShots($scores){

        $shots = 0;

        foreach($scores as $score){
            $shots = $shots + $score->score;
        }
        return $shots;
    }

    public function getCourses($courses_played){

        return array_unique($courses_played, SORT_REGULAR);
    }

    public function getBfr($rounds)
    {
        $i=1;
        $sum = count($rounds);
        $dirArray = [];

        while($i <= $sum){
            $dirArray[$i][0] = 0;
            $i++;
        }

            $j = 1;
            foreach($rounds as $round){

            foreach($round->score as $score){
                $dirArray[$j][] = $this->checkScore($score->score, $score->par);
                }
             $j++;
            }

        $bfr = 0;
        for($k=1; $k<=$sum; $k++) {

            $quad = $this->in_array_r("quad", $dirArray[$k]) ? 'found' : 'not';
            $trpbogey = $this->in_array_r("trpbogey", $dirArray[$k]) ? 'found' : 'not';
            $dblbogey = $this->in_array_r("dblbogey", $dirArray[$k]) ? 'found' : 'not';
            $bogey = $this->in_array_r("bogey", $dirArray[$k]) ? 'found' : 'not';


            if ($quad == 'found' || $trpbogey == 'found' || $dblbogey == 'found' || $bogey == 'found') {
            } else {
                $bfr++;
            }
        }
      return $bfr;
    }


    function in_array_r($needle, $haystack) {
        $found = false;
        foreach ($haystack as $item) {
            if ($item === $needle) {
                $found = true;
                break;
            } elseif (is_array($item)) {
                $found = in_array_r($needle, $item);
                if($found) {
                    break;
                }
            }
        }
        return $found;
    }

    public function calc($scores){

      $data = ['ace'=>0, 'albatross'=>0, 'eagle'=>0, 'birdie'=>0,'par'=>0, 'bogey'=>0, 'dblbogey'=>0, 'trpbogey'=>0,'quad'=>0];

        $results = [];

        foreach($scores as $score){

                array_push($results, $this->checkScore($score->score, $score->par));
        };

        foreach($results as $result){

            switch($result){
                case 'ace':
                    $data['ace']++;
                    break;
                case 'albatross':
                    $data['albatross']++;
                    break;
                case 'eagle':
                    $data['eagle']++;
                    break;
                case 'birdie':
                    $data['birdie']++;
                    break;
                case 'par':
                    $data['par']++;
                    break;
                case 'bogey':
                    $data['bogey']++;
                    break;
                case 'dblbogey':
                    $data['dblbogey']++;
                    break;
                case 'trpbogey':
                    $data['trpbogey']++;
                    break;
                case 'quad':
                    $data['quad']++;
                    break;
            }
        };

        return $data;
    }

    public function checkScore($score, $par){

        if($par == 3){
            $x = $par - $score;

            if($x == 2){
                return 'ace';
            }
            if($x == 1){
                return 'birdie';
            }
            if($x == 0){
                return 'par';
            }
            if($x == -1){
                return 'bogey';
            }
            if($x == -2){
                return 'dblbogey';
            }
            if($x == -3){
                return 'trpbogey';
            }
            if($x == -4){
                return 'quad';
            }

        }
        if($par == 4){

            $x = $par - $score;

            if($x == 3){
                return 'ace';
            }
            if($x == 2){
                return 'eagle';
            }
            if($x == 1){
                return 'birdie';
            }
            if($x == 0){
                return 'par';
            }
            if($x == -1){
                return 'bogey';
            }
            if($x == -2){
                return 'dblbogey';
            }
            if($x == -3){
                return 'trpbogey';
            }
            if($x == -4){
                return 'quad';
            }
        }
        if($par == 5){

            $x = $par - $score;

            if($x == 4){
                return 'ace';
            }
            if($x == 3){
                return 'albatross';
            }
            if($x == 2){
                return 'eagle';
            }
            if($x == 1){
                return 'birdie';
            }
            if($x == 0){
                return 'par';
            }
            if($x == -1){
                return 'bogey';
            }
            if($x == -2){
                return 'dblbogey';
            }
            if($x == -3){
                return 'trpbogey';
            }
            if($x == -4){
                return 'quad';
            }
        }
    }

    public function generateInfo($holes, $tees){

        foreach($tees as $tee) {

            $data[$tee->id] = ['longest' => 0, 'shortest' => 10000000, 'avg' => 0, 'total' => 0];
        }

            foreach($tees as $tee){

            foreach($tee->hole as $hole){

            if($hole->length <= $data[$tee->id]['shortest']){

                $data[$tee->id]['shortest'] = $hole->length;

            }

            if($hole->length > $data[$tee->id]['shortest']){

                if($hole->length > $data[$tee->id]['longest']){
                    $data[$tee->id]['longest'] = $hole->length;
                }
            }

            $data[$tee->id]['total'] = $data[$tee->id]['total'] + $hole->length;
            $data[$tee->id]['avg'] = $data[$tee->id]['total'] / count($tee->hole);

            }
        }

        return $data;
    }

    public function getRoundsPerMonth($stats){

        $data = ['jan'=>0, 'feb'=>0, 'mar'=>0,'apr'=>0,'maj'=>0,'jun'=>0,'jul'=>0,'aug'=>0,'sep'=>0,'okt'=>0,'nov'=>0,'dec'=>0];
        $results = [];

        foreach($stats as $round){
            array_push($results, $this->getMonth($round->created_at));
        }

        foreach($results as $result){

            switch($result){
                case '01':
                    $data['jan']++;
                    break;
                case '02':
                    $data['feb']++;
                    break;
                case '03':
                    $data['mar']++;
                    break;
                case '04':
                    $data['apr']++;
                    break;
                case '05':
                    $data['maj']++;
                    break;
                case '06':
                    $data['jun']++;
                    break;
                case '07':
                    $data['jul']++;
                    break;
                case '08':
                    $data['aug']++;
                    break;
                case '09':
                    $data['sep']++;
                    break;
                case '10':
                    $data['okt']++;
                    break;
                case '11':
                    $data['nov']++;
                    break;
                case '12':
                    $data['dec']++;
                    break;
            }
        }

        return $data;

    }


    public function getRoundsPerMonthStats($stats){

        $data = ['jan'=>0, 'feb'=>0, 'mar'=>0,'apr'=>0,'maj'=>0,'jun'=>0,'jul'=>0,'aug'=>0,'sep'=>0,'okt'=>0,'nov'=>0,'dec'=>0];
        $results = [];

        foreach($stats as $round){
            array_push($results, $this->getMonth($round->created_at));
        }

        foreach($results as $result){

            switch($result){
                case '01':
                    $data['jan']++;
                    break;
                case '02':
                    $data['feb']++;
                    break;
                case '03':
                    $data['mar']++;
                    break;
                case '04':
                    $data['apr']++;
                    break;
                case '05':
                    $data['maj']++;
                    break;
                case '06':
                    $data['jun']++;
                    break;
                case '07':
                    $data['jul']++;
                    break;
                case '08':
                    $data['aug']++;
                    break;
                case '09':
                    $data['sep']++;
                    break;
                case '10':
                    $data['okt']++;
                    break;
                case '11':
                    $data['nov']++;
                    break;
                case '12':
                    $data['dec']++;
                    break;
            }
        }

        $array = [];
        $max = sizeof($data);

        for($i = 0; $i<$max; $i++ ){
            array_push($array,$results[$i]);
        }

        return $array;

    }

    public function getMonth($value){

        $date = $value->format('m');

        return $date;

    }

} 