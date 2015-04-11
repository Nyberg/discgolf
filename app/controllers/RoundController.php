<?php

use dg\Rounds\PostGroupRoundsCommand;
use dg\Rounds\PostRoundsCommand;
use dg\Rounds\RemoveRoundCommand;
use dg\Rounds\UpdateRoundCommand;
use Illuminate\Support\Facades\Redirect;

class RoundController extends BaseController {

	public function index()
	{
        #$date = date('Y-m-d', strtotime('-1 week'));
		#$rounds = Round::with('course', 'user')->where('status', 1)->where('date', '>=' , $date)->orderBy('created_at', 'desc')->paginate(15);
        $rounds = Round::where('status', 1)->orderBy('date', 'desc')->paginate(28);
        return View::make('round.index',compact('rounds'));
	}

    public function user_round($id){
        $rounds = Round::with('course')->where('user_id', $id)->where('status', 0)->get();
        $actives = Round::with('course')->where('user_id', $id)->where('status', 1)->get();
        return View::make('round.user_round', ['rounds'=>$rounds, 'actives'=>$actives]);
    }

    public function weather($id){
        $winds = Wind::get();
        $weathers = Weather::get();
        $courses = Course::get();
        $weather = Weather::whereId($id)->firstOrFail();
        $rounds = Round::where('weather_id', $id)->where('status', 1)->orderBy('date', 'desc')->get();
        return View::make('round.weather', ['rounds'=>$rounds, 'weather'=>$weather, 'winds'=>$winds, 'weathers'=>$weathers, 'courses'=>$courses]);
    }

    public function admin(){

    }

    public function startRound(){
        return View::make('round.start');
    }

    public function createPar($id, $course_id){
        $round = Round::whereId($id)->firstOrFail();
        $user = User::whereId(Auth::id())->firstOrFail();
        $course = Course::whereId($course_id)->firstOrFail();
        $users = User::get();

        $result = [];

        foreach($users as $user){
            $result[] = $user->first_name .' '.$user->last_name;
        }

        return View::make('round.par', ['user'=>$user, 'course'=>$course, 'result'=>$result, 'round'=>$round]);

    }

    public function groupCreate(){
        $num = Input::get('num');

        $group = new GroupRound();
        $group->user_id = Auth::id();
        $group->save();

        for($i = 1; $i<=$num; $i++) {

            $user_id = Input::get('player-' . $i . '');

            $user = User::whereId($user_id)->first();

            $course_id = Input::get('course');
            $tee_id = Input::get('teepad');
            $date = Input::get('date');
            $status = 0;
            $type = 'Group';
            $type_id = 0;
            $username = $user->first_name . ' ' . $user->last_name;
            $comment = Input::get('comment');
            $group_id = $group->id;
            $weather_id = Input::get('weather');
            $wind_id = Input::get('wind');

            $command = new PostGroupRoundsCommand(
                $user_id,
                $course_id,
                $tee_id,
                $date,
                $status,
                $type,
                $type_id,
                $username,
                $comment,
                $group_id,
                $weather_id,
                $wind_id
            );

            $this->CommandBus->execute($command);

        }

        return Redirect::to('/');
    }

	public function create()
	{
        $user = User::whereId(Auth::id())->first();

        $round = new Round();

        $round->user_id = Auth::id();
        $round->course_id = Input::get('course');
        $round->tee_id = Input::get('teepad');
        $round->date =  Input::get('date');
        $round->status = 0;
        $round->group_id = 0;
        $round->weather_id = Input::get('weather');
        $round->wind_id = Input::get('wind');

        if(Input::get('type') == 'Singel'){
            $round->type = 'Singel';
            $round->type_id = 0;
        }if(Input::get('type') == 'Par'){
            $round->type = 'Par';
            $round->type_id = Input::get('players');
        }

        $round->username = $user->first_name;
        $round->comment = Input::get('comment');

        $round->save();

        return Redirect::to('/account/round/'.$round->id.'/course/'.$round->tee_id.'/score/add/')->with('headsup', 'Runda tillagd!');
    }


    public function getCourse(){

        $courses = Course::whereStatus(1)->get();
        $weathers = Weather::get();
        $winds = Wind::get();

        return View::make('round.create',['courses'=>$courses, 'weathers'=>$weathers, 'winds'=>$winds]);
    }

	public function store()
	{
        $id = Input::get('round_id');
        $round = Round::whereId($id)->firstOrFail();
        $holes = Hole::where('tee_id', $round->tee_id)->orderBy('number', 'asc')->get();
        $tee = Tee::with('hole')->whereId($round->tee_id)->firstOrFail();

        if(Auth::id() == $round->user_id){

            $total = 0;
            $number = Input::get('holes');

            foreach($tee->hole as $hole){

                $score = new Score();

                $score->user_id = Auth::User()->id;
                $score->hole_id = Input::get('hole_id-'.$hole->id.'');
                $score->round_id = Input::get('round_id');
                $score->course_id = $round->course_id;
                $score->score = Input::get('score-'.$hole->id.'');
                $score->par = Input::get('par-'.$hole->id.'');
                $x = Input::get('score-'.$hole->id.'');

                $total = (int)$total + (int)$x;
                $score->save();

            };

            $round = Round::whereId($id)->firstOrFail();

            $round->total = $total;
            $round->status = 0;

            $round->save();

            return Redirect::to('/account/rounds/'.Auth::id().'/user')->with('success', 'Runda tillagd!');

        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte redigera detta..');
        }
	}

    public function show($id, $course_id)
    {
        $round = Round::with('score')->whereId($id)->firstOrFail();
        $course = Course::whereId($course_id)->firstOrFail();
        $tee = Tee::with('hole')->where('id', $round->tee_id)->firstOrFail();
        $scores = Score::with('hole')->where('round_id', $id)->get();
        $shots = Shot::with('disc')->where('round_id', $id)->get();
        $records = Record::where('course_id', $course_id)->where('tee_id', $round->tee_id)->where('type', $round->type)->where('status', 1)->get();
        $sum = Hole::where('tee_id', $id)->sum('length');

        if(Auth::check()){
            $u_rounds = Round::where('status', 1)->where('user_id', Auth::id())->where('tee_id', $round->tee_id)->get();
            return View::make('round.show', ['round'=>$round, 'tee'=>$tee, 'shots'=>$shots, 'scores'=>$scores, 'records'=>$records, 'sum'=>$sum, 'course'=>$course, 'u_rounds'=>$u_rounds]);
        }

        return View::make('round.show', ['round'=>$round, 'tee'=>$tee, 'shots'=>$shots, 'scores'=>$scores, 'records'=>$records, 'sum'=>$sum, 'course'=>$course]);
    }

	public function edit($id, $course_id)
	{
        $round = Round::with('score')->whereId($id)->firstOrFail();

        if($round->user_id == Auth::user()->id && $round->status == 0) {

            $tee = Tee::with('hole')->where('course_id',$course_id)->firstOrFail();
            $courses = Course::lists('name', 'id');

            return View::make('round.edit', ['round' => $round, 'tee' => $tee, 'courses' => $courses]);
        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte redigera detta!');
        }
	}

    public function editScore($id){

        $round = Round::with('score')->whereId($id)->firstOrFail();

        if(Auth::id() == $round->user_id){
            return View::make('round.editScore', ['round' => $round]);
        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte redigera detta!');
        }

    }

	public function update($id)
	{
        $round = Round::whereId($id)->firstOrFail();

        if(Auth::id() == $round->user_id){

            $id = $round->id;
            $comment = Input::get('comment');

            $command = new UpdateRoundCommand(
                $id,
                $comment
            );

            $this->CommandBus->execute($command);

            return Redirect::back()->with('success', 'Runda uppdaterad!');

        }else {

            return Redirect::back()->with('danger', 'Du kan inte redigera detta..');
        }
	}

	public function destroy($id)
	{
		$round = Round::whereId($id)->firstOrFail();

        if($round->user_id == Auth::user()->id || Auth::user()->hasRole('Admin')){

        $id = $round->id;

            $command = new RemoveRoundCommand($id);

            $this->CommandBus->execute($command);

        return Redirect::back()->with('success', 'Runda borttagen!');

        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte ta bort detta..');
        }
	}

    public function app(){
        return View::make('round.app');
    }

    public function courseRound($id){

        $rounds = Round::where('course_id', $id)->orderBy('date', 'desc')->paginate(15);
        $course = Course::find($id);

        return View::make('course.rounds', compact('rounds'), ['course'=>$course]);

    }

    public function group(){
        return View::make('round.group');
    }

    public function groupRound(){
        $courses = Course::whereStatus(1)->get();
        $users = User::get();
        $weathers = Weather::get();
        $winds = Wind::get();
        return View::make('round.create-group', ['courses'=>$courses, 'users'=>$users, 'weathers'=>$weathers, 'winds'=>$winds]);
    }

    public function records(){
        $records = Record::orderBy('date', 'desc')->get();

        return View::make('round.records', ['records'=>$records]);
    }

    public function getGroupRounds(){

        $id = Input::get('id');
        $round_id = Input::get('round_id');
        $rounds = Round::where('group_id',$id)->where('status', 1)->orderBy('total', 'asc')->get();
        $data = [];
        $i = 1;

        foreach($rounds as $r){
            if($r->id == $round_id){
            }else{
                $data[$i] = $r;
                $data[$i][0] = $r->score;
                $i++;
            }
        }

        $message = $data;

        return Response::json($message);
    }

    #       APP         #

    public function appRound(){
        $courses = Course::whereStatus(1)->get();
        $weathers = Weather::get();
        $winds = Wind::get();

        return View::make('app.app',['courses'=>$courses, 'weathers'=>$weathers, 'winds'=>$winds]);
    }

    public function appCreate(){

        $user = User::whereId(Auth::id())->firstOrFail();
        $date = new DateTime();
        $round = new Round();

        $round->user_id = Auth::id();
        $round->type = 'Singel';
        $round->date = $date->format('Y-m-d');
        $round->course_id = Input::get('course');
        $round->tee_id = Input::get('teepad');
        $round->status = 0;
        $round->group_id = 0;
        $round->type_id = 0;

        $round->username = $user->first_name;

        $round->save();

        $hole = Hole::where('tee_id', $round->tee_id)->where('number', 1)->firstOrFail();

        return Redirect::to('/account/app/round/'.$round->id.'/start/'.$hole->id.'')->with('headsup', 'Rundan är startad. Lycka till!');
    }

    public function appStart($id, $hole){
        $round = Round::whereId($id)->firstOrFail();
        $hole = Hole::where('id', $hole)->where('tee_id', $round->tee_id)->firstOrFail();

        $par = 0;
        $total = 0;
        $scores = Score::where('round_id', $round->id)->get();

        foreach($scores as $s){
            $par = $par + $s->par;
            $total = $total + $s->score;
        }

        return View::make('app.start', ['round'=>$round, 'hole'=>$hole, 'par'=>$par, 'total'=>$total]);
    }

    public function appScore($id, $hole){

        $round = Round::whereId($id)->firstOrFail();
        $hole = Hole::whereId($hole)->firstOrFail();

        $score = new Score();
        $score->user_id = Auth::id();
        $score->round_id = $round->id;
        $score->hole_id = $hole->id;
        $score->score = Input::get('score-'.$hole->id.'');
        $score->par = $hole->par;
        $score->course_id = $round->course_id;

        $score->save();

        $round->total = $round->total + $score->score;
        $round->save();

        if($hole->number < $round->tee->holes){

            $x = $hole->number + 1;
            $next = Hole::where('number', $x)->where('tee_id', $round->tee_id)->firstOrFail();
            $nexthole = $next->id;
            return Redirect::to('/account/app/round/'.$round->id.'/start/'.$nexthole.'');
        }else{
            return Redirect::to('/account/app/round/'.$round->id.'/finish');
        }
    }

    public function appFinish($id){
        $round = Round::whereId($id)->firstOrFail();
        $weathers = Weather::get();
        $winds = Wind::get();

        return View::make('app.finish', ['round'=>$round,'weathers'=>$weathers, 'winds'=>$winds])->with('success', 'Bra jobbat!');
    }

    public function appStore($id){
        $round = Round::whereId($id)->firstOrFail();

        $round->weather_id = Input::get('weather');
        $round->wind_id = Input::get('wind');
        $round->comment = Input::get('comment');

        $round->save();

        return Redirect::to('/account/rounds/'.$round->user_id.'/user')->with('success', 'Rundan är sparad!');
    }

}
