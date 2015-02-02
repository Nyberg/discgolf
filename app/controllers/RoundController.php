<?php

class RoundController extends \BaseController {

	public function index()
	{
		$rounds = Round::with('course', 'user')->where('status', 1)->orderBy('created_at', 'desc')->paginate(15);

        return View::make('round.index',compact('rounds'));
	}

    public function user_round($id){

        $rounds = Round::with('course')->where('user_id', $id)->get();

        return View::make('round.user_round', ['rounds'=>$rounds]);

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
        $name = Auth::user()->first_name.' '. Auth::user()->last_name;

        if(Input::get('type') == 'Singel'){

            $round = new Round();
            $round->course_id = Input::get('course');
            $round->tee_id = Input::get('teepad');
            $round->user_id = Auth::User()->id;
            $round->username = $name;
            $round->status = 0;
            $round->type = 'Singel';
            $round->date = Input::get('date');
            $round->save();

            $course = Tee::with('hole')->whereId($round->tee_id)->firstOrFail();

            return Redirect::to('/account/round/'.$round->id.'/course/'.$course->id.'/score/add');
        }else{

            $round = new Round();
            $round->course_id = Input::get('course');
            $round->tee_id = Input::get('teepad');
            $round->user_id = Auth::User()->id;
            $round->username = $name;
            $round->status = 0;
            $round->type = 'Par';
            $round->par_id = Input::get('players');
            $round->date = Input::get('date');
            $round->save();

            $course = Tee::with('hole')->whereId($round->tee_id)->firstOrFail();
            return Redirect::to('/account/round/'.$round->id.'/course/'.$course->id.'/score/add');
        }

        }

    public function getCourse(){

        $courses = Course::whereStatus(1)->get();

        return View::make('round.create')->with('courses', $courses);
    }

	public function store()
	{
        $total = 0;
        $number = Input::get('holes');
        $id = Input::get('round_id');

        for($i = 1; $i <= $number; $i++){

            $score = new Score();

            $score->user_id = Auth::User()->id;
            $score->hole_id = Input::get('hole_id-'.$i.'');
            $score->round_id = Input::get('round_id');
            $score->score = Input::get('score-'.$i.'');
            $score->par = Input::get('par-'.$i.'');
            $x = Input::get('score-'.$i.'');

            $total = (int)$total + (int)$x;
            $score->save();

        };

        $round = Round::whereId($id)->firstOrFail();

        $round->total = $total;
        $round->status = 1;
        $round->save();

        return Redirect::to('/dashboard')->with('success', 'Runda tillagd!');
	}

    public function show($id, $course_id)
    {
        $round = Round::with('score')->whereId($id)->firstOrFail();
        $course = Course::whereId($course_id)->firstOrFail();
        $tee = Tee::with('hole')->where('course_id', $course_id)->firstOrFail();
        $scores = Score::with('hole')->where('round_id', $id)->get();
        $shots = Shot::with('disc')->where('round_id', $id)->get();
        $record = Round::where('course_id', $course_id)->orderBy('total', 'desc')->firstOrFail();
        $sum = Hole::where('tee_id', $id)->sum('length');

        return View::make('round.show', ['round'=>$round, 'tee'=>$tee, 'shots'=>$shots, 'scores'=>$scores, 'record'=>$record, 'sum'=>$sum, 'course'=>$course]);
    }

	public function edit($id, $course_id)
	{
        $round = Round::with('score')->whereId($id)->firstOrFail();

        if($round->user_id == Auth::user()->id) {

            $tee = Tee::with('hole')->where('course_id',$course_id)->firstOrFail();
            $courses = Course::lists('name', 'id');

            return View::make('round.edit', ['round' => $round, 'tee' => $tee, 'courses' => $courses]);
        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte redigera det!');
        }
	}

	public function update($id)
	{
        $round = Round::whereId($id)->firstOrFail();

        if (is_null($round)) {
            return Redirect::back()->with('danger', 'Något gick snett!');
        } else {

            $round = Round::whereId($id)->firstOrFail();
            $round->tee_id = Input::get('tee_id');
            $round->comment = Input::get('comment');
            $round->status = Input::get('status');

            $round->save();

            return Redirect::back()->with('success', 'Runda uppdaterad!');
        }
	}

	public function destroy($id)
	{
		$round = Round::whereId($id)->firstOrFail();

        if($round->user_id == Auth::user()->id){

        $round->delete();

        $scores = Score::where('round_id', $id)->get();

        foreach($scores as $score){
            $score->delete();
        }

        return Redirect::back()->with('success', 'Runda borttagen!');

        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte redigera det!');
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

}
