<?php

use dg\statistics\Stat;

class StatisticsController extends BaseController {

    private $stat;

    public function __construct(Stat $stat){

        $this->stat = $stat;
    }

    public function index(){

        $rounds = Round::get();
        $courses = Course::get();

        return View::make('index.stats', ['courses'=>$courses]);
    }

    # Visa översiktlig statistik #
    public function getUserData()
    {
        $id = Input::get('id');
        $model = Input::get('model');
        $user = User::find($id);

        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->get();
        }
        if($model == 'user'){
            $scores = Score::where('user_id', $id)->get();
            $courses_played = Round::where('user_id', $id)->lists('tee_id');
            $datarounds = Round::with('score')->where('user_id', $id)->where('status', 1)->get();
            $rounds = Round::where('user_id', $id)->where('status', 1)->count();
            $total = Round::where('user_id', $id)->where('status', 1)->sum('total');

            $data = $this->stat->calc($scores);
            $shots = $this->stat->calcShots($scores);
            $cp = $this->stat->getCourses($courses_played);
            $bfr = $this->stat->getBfr($datarounds);
            $avg = $this->stat->getAvg($scores, $datarounds);
            $birdies = $this->stat->getBirdies($datarounds);

        }

        $message = [
            'msg' => 'success',
            'user' => $name,
            'avg' => $avg,
            'shots' => $total,
            'cp'    => count($cp),
            'bfr'   => $bfr,
            'birdies' => $birdies,
            'rounds'    => $rounds

        ];

        return Response::json($message);
    }

    # Visa översiktlig statistik - reloaded #
    public function getUserDataReload()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $user = User::find($id);

        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'course'){
            $scores = Score::where('course_id', $id)->get();
        }
        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->get();
        }
        if($model == 'user'){
            $scores = Score::where('user_id', $id)->get();
            $courses_played = Round::where('user_id', $id)->lists('tee_id');
            $datarounds = Round::with('score')->where('user_id', $id)->where('status', 1)->get();
            $total = Round::where('user_id', $id)->where('status', 1)->sum('total');
            $rounds = Round::where('user_id', $id)->where('status', 1)->count();

            $data = $this->stat->calc($scores);
            $shots = $this->stat->calcShots($scores);
            $cp = $this->stat->getCourses($courses_played);
            $bfr = $this->stat->getBfr($datarounds);
            $avg = $this->stat->getAvg($scores, $datarounds);
            $birdies = $this->stat->getBirdies($datarounds);

        }

        $message = [
            'msg' => 'success',
            'user' => $name,
            'avg' => $avg,
            'shots' => $total,
            'cp'    => count($cp),
            'bfr'   => $bfr,
            'birdies' => $birdies,
            'rounds'    => $rounds

        ];

        return Response::json($message);

    }

    # Personlig statistik (pie)#
    public function getStats()
    {

        $input = Input::all();

        if($input['model'] == 'hole'){
            $hole = Hole::where('id', $input['id'])->firstOrFail();
            $scores = Score::where('hole_id', $input['id'])->where('user_id', Auth::id())->get();
            $rounds = Round::where('user_id', Auth::id())->where('tee_id', $hole->tee_id)->where('status', 1)->get();
        }
        if($input['model'] == 'course'){
            $scores = Score::where('course_id', $input['id'])->where('user_id', Auth::id())->get();
            $rounds = Round::where('course_id', $input['id'])->where('user_id', Auth::id())->where('status', 1)->get();
        }
        if($input['model'] == 'user'){
            $scores = Score::where('user_id', $input['id'])->get();
            $rounds = Round::where('user_id', $input['id'])->where('status', 1)->get();
        }

        $stats = $this->stat->calc($scores);
        $avg = $this->stat->getAvgScore($scores);

        $message = [
            'msg' => 'success',
            'avg' => $avg['avg'],
            'shots' => $avg['shots'],
            'results' => count($scores),
            'rounds'    => count($rounds),
            'ace'   => $stats['ace'],
            'eagle'   => $stats['eagle'],
            'birdie'   => $stats['birdie'],
            'par'   => $stats['par'],
            'bogey'   => $stats['bogey'],
            'dblbogey'   => $stats['dblbogey'],
            'trpbogey'   => $stats['trpbogey'],
            'quad'   => $stats['quad']
        ];

        return Response::json($message);

    }

    # Visar hål-resultat i pie #
    public function getHoleStats()
    {
        $id = Input::get('id');
        $model = Input::get('model');
        $user = User::find(Auth::id());

        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'course'){
            $scores = Score::where('course_id', $id)->get();
        }
        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->get();
        }
        if($model == 'user'){
            $scores = Score::where('user_id', $id)->get();
        }

        $stats = $this->stat->calc($scores);
        $avg = $this->stat->getAvgScore($scores);

        $message = [
            'msg' => 'success',
            'user' => $name,
            'avg' => $avg['avg'],
            'shots' => $avg['shots'],
            'results' => count($scores),
            'ace'   => $stats['ace'],
            'eagle'   => $stats['eagle'],
            'birdie'   => $stats['birdie'],
            'par'   => $stats['par'],
            'bogey'   => $stats['bogey'],
            'dblbogey'   => $stats['dblbogey'],
            'trpbogey'   => $stats['trpbogey'],
            'quad'   => $stats['quad']
        ];

        return Response::json($message);

    }

    # Visar rundor per månad #
    public function getRoundsPerMonth()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        if($model == 'stats'){
            $rounds = Round::where('status', 1)->get();
            $stats = $this->stat->getRoundsPerMonth($rounds);

            $message = [
                'msg' => 'success',
                'user' => 'Whatever',
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
            ];
        }

        if($model == 'user'){

            $user = User::whereId($id)->firstOrFail();
            $name = $user->first_name . ' ' . $user->last_name;

            $rounds = Round::where('user_id', $id)->where('status', 1)->get();

            $stats = $this->stat->getRoundsPerMonth($rounds);
            $message = [
                'msg' => 'success',
                'user' => $name,
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
            ];

        }
        if($model == 'course'){
            $rounds = Round::where('course_id', $id)->where('status', 1)->get();
            $user_rounds = Round::where('user_id', Auth::id())->where('course_id', $id)->where('status', 1)->get();
            $course = Course::whereId($id)->firstOrFail();
            $course = $course->name;

            $user = User::whereId(Auth::id())->firstOrFail();
            $name = $user->first_name . ' ' . $user->last_name;

            $data = $this->stat->getRoundsPerMonth($user_rounds);
            $stats = $this->stat->getRoundsPerMonth($rounds);

            $message = [
                'msg' => 'success',
                'user' => $name,
                'model_name' => $course,
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
                'u_jan'  =>  $data['jan'],
                'u_feb'   => $data['feb'],
                'u_mar'   => $data['mar'],
                'u_apr'   => $data['apr'],
                'u_maj'   => $data['maj'],
                'u_jun'   => $data['jun'],
                'u_jul'   => $data['jul'],
                'u_aug'   => $data['aug'],
                'u_sep'   => $data['sep'],
                'u_okt'   => $data['okt'],
                'u_nov'   => $data['nov'],
                'u_dec'   => $data['dec'],
            ];
        }

        return Response::json($message);

    }

    # Visar rundor per månad - reloaded #
    public function getCourseRoundsReload()
    {
        $id = Input::get('id');

        $user = User::whereId(Auth::id())->firstOrFail();
        $name = $user->first_name . ' ' . $user->last_name;

        $rounds = Round::where('course_id', $id)->where('status',1)->get();
        $user_rounds = Round::where('user_id', Auth::id())->where('course_id', $id)->where('status',1)->get();
        $course = Course::whereId($id)->firstOrFail();
        $course = $course->name;

        $stats = $this->stat->getRoundsPerMonth($rounds);
        $data = $this->stat->getRoundsPerMonth($user_rounds);
        $message = [
            'msg' => 'success',
            'user' => $name,
            'model_name' => $course,
            'jan'  =>  $stats['jan'],
            'feb'   => $stats['feb'],
            'mar'   => $stats['mar'],
            'apr'   => $stats['apr'],
            'maj'   => $stats['maj'],
            'jun'   => $stats['jun'],
            'jul'   => $stats['jul'],
            'aug'   => $stats['aug'],
            'sep'   => $stats['sep'],
            'okt'   => $stats['okt'],
            'nov'   => $stats['nov'],
            'dec'   => $stats['dec'],
            'u_jan'  =>  $data['jan'],
            'u_feb'   => $data['feb'],
            'u_mar'   => $data['mar'],
            'u_apr'   => $data['apr'],
            'u_maj'   => $data['maj'],
            'u_jun'   => $data['jun'],
            'u_jul'   => $data['jul'],
            'u_aug'   => $data['aug'],
            'u_sep'   => $data['sep'],
            'u_okt'   => $data['okt'],
            'u_nov'   => $data['nov'],
            'u_dec'   => $data['dec'],
        ];

        return Response::json($message);

    }

    # Visar rundor per månad - user #
    public function getRoundsPerMonthReload()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $user = User::whereId($id)->firstOrFail();
        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'user'){

            $rounds = Round::where('user_id', $id)->where('status', 1)->get();

        }

        $stats = $this->stat->getRoundsPerMonth($rounds);
        $message = [
            'msg' => 'success',
            'user' => $name,
            'jan'  =>  $stats['jan'],
            'feb'   => $stats['feb'],
            'mar'   => $stats['mar'],
            'apr'   => $stats['apr'],
            'maj'   => $stats['maj'],
            'jun'   => $stats['jun'],
            'jul'   => $stats['jul'],
            'aug'   => $stats['aug'],
            'sep'   => $stats['sep'],
            'okt'   => $stats['okt'],
            'nov'   => $stats['nov'],
            'dec'   => $stats['dec'],
        ];

        return Response::json($message);

    }

    # Runda - visar snitt, bansnitt och användarsnitt #
    public function getRoundAvgScore()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $round = Round::where('id', $id)->first();
        $num = Round::where('tee_id', $round->tee_id)->where('user_id', Auth::id())->where('status', 1)->count();

        $tee = Tee::where('id', $round->tee_id)->first();
        $tees = Tee::where('id', $round->tee_id)->get();
        $rounds = Round::where('tee_id', $round->tee_id)->where('status', 1)->get();
        #$round = Round::where('id', $round->id)->firstOrFail();

        if($num == 0 || $num == null){
            $user = $this->stat->generateBlank($tee);

        }else{
            $user_rounds = Round::where('tee_id', $round->tee_id)->where('user_id', Auth::id())->where('status', 1)->get();
            $user = $this->stat->generateUserAvg($tee, $user_rounds);
        }

        $holearray = [];
        foreach($tee->hole as $hole){
            array_push($holearray, $hole->number);
        }

        $stats = $this->stat->generateRound($round, $tee);
        $avg = $this->stat->generateAvg($tees,$rounds);

        $message = [$holearray, $user, $stats, $avg];

        /*
        $message = [
            'msg' => 'success',
            'holes' => $tee->holes,
            '1'  =>  $stats['1'],
            '2'   => $stats['2'],
            '3'   => $stats['3'],
            '4'   => $stats['4'],
            '5'   => $stats['5'],
            '6'   => $stats['6'],
            '7'   => $stats['7'],
            '8'   => $stats['8'],
            '9'   => $stats['9'],
            '10'   => $stats['10'],
            '11'   => $stats['11'],
            '12'   => $stats['12'],
            '13'   => $stats['13'],
            '14'   => $stats['14'],
            '15'   => $stats['15'],
            '16'   => $stats['16'],
            '17'   => $stats['17'],
            '18'   => $stats['18'],
            'a1'   => $avg[$tee->id]['1'],
            'a2'   => $avg[$tee->id]['2'],
            'a3'   => $avg[$tee->id]['3'],
            'a4'   => $avg[$tee->id]['4'],
            'a5'   => $avg[$tee->id]['5'],
            'a6'   => $avg[$tee->id]['6'],
            'a7'   => $avg[$tee->id]['7'],
            'a8'   => $avg[$tee->id]['8'],
            'a9'   => $avg[$tee->id]['9'],
            'a10'   => $avg[$tee->id]['10'],
            'a11'   => $avg[$tee->id]['11'],
            'a12'   => $avg[$tee->id]['12'],
            'a13'   => $avg[$tee->id]['13'],
            'a14'   => $avg[$tee->id]['14'],
            'a15'   => $avg[$tee->id]['15'],
            'a16'   => $avg[$tee->id]['16'],
            'a17'   => $avg[$tee->id]['17'],
            'a18'   => $avg[$tee->id]['18'],
            'u1'    => $user[$tee->id]['1'],
            'u2'    => $user[$tee->id]['2'],
            'u3'    => $user[$tee->id]['3'],
            'u4'    => $user[$tee->id]['4'],
            'u5'    => $user[$tee->id]['5'],
            'u6'    => $user[$tee->id]['6'],
            'u7'    => $user[$tee->id]['7'],
            'u8'    => $user[$tee->id]['8'],
            'u9'    => $user[$tee->id]['9'],
            'u10'    => $user[$tee->id]['10'],
            'u11'    => $user[$tee->id]['11'],
            'u12'    => $user[$tee->id]['12'],
            'u13'    => $user[$tee->id]['13'],
            'u14'    => $user[$tee->id]['14'],
            'u15'    => $user[$tee->id]['15'],
            'u16'    => $user[$tee->id]['16'],
            'u17'    => $user[$tee->id]['17'],
            'u18'    => $user[$tee->id]['18']
        ]; */

        return Response::json($message);

    }

    # Senaste resultaten #
    public function getRoundAvg()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        if($model == 'course') {

            $rounds = Round::where('course_id',$id)->where('status', 1)->get();
            $data = $this->stat->roundScores($rounds);

            $message = $data;
        }
        if($model == 'user'){
            $rounds = Round::where('user_id',$id)->where('status', 1)->get();
            $data = $this->stat->roundScores($rounds);

            $message = $data;
        }
        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->limit(5)->get();
            $data = $this->stat->holeScores($scores);

            $message = $data;
        }
        if($model == 'stats'){

            $date_to = Input::get('date_to');
            $date_from = Input::get('date_from');
            $course_id = Input::get('course_id');

            if($course_id == 0){
                $rounds = Round::where('date', '>=', $date_from)->where('date', '<=', $date_to)->where('user_id', Auth::id())->where('status', 1)->orderBy('date', 'asc')->get();
            }else{
                $rounds = Round::where('date', '>=', $date_from)->where('date', '<=', $date_to)->where('course_id', $course_id)->where('user_id', Auth::id())->where('status', 1)->orderBy('date', 'asc')->get();
            }

            $data = $this->stat->roundScores($rounds);

            $message = $data;

        }

        return Response::json($message);

    }

    public function getRoundCompare(){

        $id = Input::get('id');
        #$model = Input::get('model');

        $round = Round::whereId($id)->first();
        $scores = Score::where('round_id', $id)->get();
        $data = [];
        $i = 1;

        foreach($scores as $sc){
            $data[$i] = $sc->score;
            $i++;
        }

        $message = $scores;

        return Response::json($message);
    }

    public function addToCompare(){
        $id = Input::get('id');

        $compare = Compare::where('user_id', Auth::id())->first();

        $item = new CompareItems();
        $item->user_id = Auth::id();
        $item->round_id = $id;
        $item->compare_id = $compare->id;

        $item->save();

        $message = [count($compare->items)];

        return Response::json($message);
    }

    public function getCompareNumber(){

        $compare = Compare::where('user_id', Auth::id())->first();

        $message = count($compare->items);

        return Response::json($message);
    }

    public function test($id){

        $id = $id;

        $round = Round::where('id', $id)->first();
        $num = Round::where('tee_id', $round->tee_id)->where('user_id', Auth::id())->where('status', 1)->count();

        $tee = Tee::where('id', $round->tee_id)->first();
        $tees = Tee::where('id', $round->tee_id)->get();
        $rounds = Round::where('tee_id', $round->tee_id)->where('status', 1)->get();
        #$round = Round::where('id', $round->id)->firstOrFail();

        if($num == 0 || $num == null){
            $user = $this->stat->generateBlank($tee);

        }else{
            $user_rounds = Round::where('tee_id', $round->tee_id)->where('user_id', Auth::id())->where('status', 1)->get();
            $user = $this->stat->generateUserAvg($tee, $user_rounds);
        }

        $stats = $this->stat->generateRound($round, $tee);
        $avg = $this->stat->generateAvg($tees,$rounds);

        dd($stats, $avg, $user);
}

}
