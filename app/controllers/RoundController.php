<?php

use dg\Rounds\PostRoundsCommand;
use dg\Rounds\RemoveRoundCommand;
use dg\Rounds\UpdateRoundCommand;
use Illuminate\Support\Facades\Redirect;

class RoundController extends BaseController {

	public function index()
	{
        #$date = date('Y-m-d', strtotime('-1 week'));

		#$rounds = Round::with('course', 'user')->where('status', 1)->where('date', '>=' , $date)->orderBy('created_at', 'desc')->paginate(15);
        $rounds = Round::where('status', 1)->orderBy('date', 'desc')->paginate(15);
        return View::make('round.index',compact('rounds'));
	}

    public function user_round($id){

        $rounds = Round::with('course')->where('user_id', $id)->where('status', 0)->get();
        $actives = Round::with('course')->where('user_id', $id)->where('status', 1)->get();
        return View::make('round.user_round', ['rounds'=>$rounds, 'actives'=>$actives]);
    }

    public function admin(){

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

	public function create()
	{
        $user = User::whereId(Auth::id())->first();

        $user_id = Auth::id();
        $course_id = Input::get('course');
        $tee_id = Input::get('teepad');
        $date =  Input::get('date');
        $status = 0;

        if(Input::get('type') == 'Singel'){
            $type = 'Singel';
            $par_id = 0;
        }else{
            $type = 'Par';
            $par_id = Input::get('players');
        }

        $username = $user->first_name . ' ' . $user->last_name;
        $comment = Input::get('comment');

        $command = new PostRoundsCommand(
            $user_id,
            $course_id,
            $tee_id,
            $date,
            $status,
            $type,
            $par_id,
            $username,
            $comment
        );

    #    dd($command);

        $this->CommandBus->execute($command);

        return Redirect::to('/')->with('headsup', 'Klicka bland dina notifikationer för att lägga till ditt resultat!');
        }

    public function getCourse(){

        $courses = Course::whereStatus(1)->get();

        return View::make('round.create')->with('courses', $courses);
    }

	public function store()
	{
        $id = Input::get('round_id');
        $round = Round::whereId($id)->firstOrFail();

        if(Auth::id() == $round->user_id){

            $total = 0;
            $number = Input::get('holes');

            for($i = 1; $i <= $number; $i++){

                $score = new Score();

                $score->user_id = Auth::User()->id;
                $score->hole_id = Input::get('hole_id-'.$i.'');
                $score->round_id = Input::get('round_id');
                $score->course_id = $round->course_id;
                $score->score = Input::get('score-'.$i.'');
                $score->par = Input::get('par-'.$i.'');
                $x = Input::get('score-'.$i.'');

                $total = (int)$total + (int)$x;
                $score->save();

            };

            $round = Round::whereId($id)->firstOrFail();

            /*  $p_rating = Auth::user()->rating;
              $c_rating = $round->course->rating;
              $base = $c_rating - $p_rating; */

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
        $tee = Tee::with('hole')->where('course_id', $course_id)->firstOrFail();
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

        } else {

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


    public function records(){
        $records = Record::where('status', 1)->orderBy('date', 'desc')->paginate(15);

        return View::make('round.records', compact('records'));
    }

}
