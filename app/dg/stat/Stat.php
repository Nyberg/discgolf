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

        $data = ['longest'=>0, 'shortest'=>10000000, 'avg'=>0, 'total'=>0];

        foreach($holes as $hole){

            if($hole->length <= $data['shortest']){

                $data['shortest'] = $hole->length;

            }

            if($hole->length > $data['shortest']){

                if($hole->length > $data['longest']){
                    $data['longest'] = $hole->length;
                }

            }

            $data['total'] = $data['total'] + $hole->length / count($tees);
            $data['avg'] = $data['total'] / count($holes);



        }

       # print_r($data['longest'] . ' - ' . $data['shortest'] . ' - ' . $data['total'] . ' - ' . $data['avg']);

        return $data;

    }

} 