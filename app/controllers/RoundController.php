<?php

class RoundController extends \BaseController {

	public function index()
	{
		$rounds = Round::with('course', 'user')->where('status', 1)->orderBy('created_at', 'desc')->paginate(15);

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

      /*  $p_rating = Auth::user()->rating;
        $c_rating = $round->course->rating;
        $base = $c_rating - $p_rating; */

        $round->total = $total;
        $round->status = 0;

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
        $records = Record::where('course_id', $course_id)->where('tee_id', $round->tee_id)->where('type', $round->type)->get();
        $sum = Hole::where('tee_id', $id)->sum('length');

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
            return Redirect::to('/')->with('danger', 'Du kan inte redigera det!');
        }
	}

    public function editScore($id){

        $round = Round::with('score')->whereId($id)->firstOrFail();
        return View::make('round.editScore', ['round' => $round]);
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

    public function setActive($id)
    {

        $round = Round::find($id);

        $round->status = 1;
        $round->save();

        if ($round->type == 'Singel') {

            $num = Record::where('course_id', $round->course_id)->where('type', 'Singel')->where('tee_id', $round->tee_id)->where('status', 1)->orderBy('total', 'asc')->pluck('total');

            if ($num == null && $round->type == 'Singel') {

                $record = new Record();
                $record->user_id = Auth::id();
                $record->course_id = $round->course_id;
                $record->tee_id = $round->tee_id;
                $record->type = $round->type;
                $record->total = $round->total;
                $record->date = $round->date;
                $record->par_id = $round->par_id;
                $record->round_id = $round->id;
                $record->status = 1;

                $record->save();


            }

            if ($round->total == (int)$num) {
                $record = new Record();
                $record->user_id = Auth::id();
                $record->course_id = $round->course_id;
                $record->tee_id = $round->tee_id;
                $record->type = $round->type;
                $record->total = $round->total;
                $record->date = $round->date;
                $record->par_id = $round->par_id;
                $record->round_id = $round->id;
                $record->status = 1;

                $record->save();

            }
            if ($round->total < (int)$num) {

                $recs = Record::where('course_id', $round->course_id)->where('total', $num)->where('type', 'Singel')->where('status', 1)->get();

                foreach ($recs as $rec) {

                    $rec->status = 0;
                }

                $record = new Record();
                $record->user_id = Auth::id();
                $record->course_id = $round->course_id;
                $record->tee_id = $round->tee_id;
                $record->type = $round->type;
                $record->total = $round->total;
                $record->date = $round->date;
                $record->par_id = $round->par_id;
                $record->round_id = $round->id;
                $record->status = 1;

                $record->save();

            }
        }

        if ($round->type == 'Par') {

            $num = Record::where('course_id', $round->course_id)->where('type', 'Par')->where('tee_id', $round->tee_id)->where('status', 1)->orderBy('total', 'asc')->pluck('total');

            if ($num == null && $round->type == 'Par') {

                $record = new Record();
                $record->user_id = Auth::id();
                $record->course_id = $round->course_id;
                $record->tee_id = $round->tee_id;
                $record->type = $round->type;
                $record->total = $round->total;
                $record->date = $round->date;
                $record->par_id = $round->par_id;
                $record->round_id = $round->id;
                $record->status = 1;

                $record->save();
            }

            if ($round->total == (int)$num) {
                $record = new Record();
                $record->user_id = Auth::id();
                $record->course_id = $round->course_id;
                $record->tee_id = $round->tee_id;
                $record->type = $round->type;
                $record->total = $round->total;
                $record->date = $round->date;
                $record->par_id = $round->par_id;
                $record->round_id = $round->id;
                $record->status = 1;

                $record->save();

            }
            if ($round->total < (int)$num) {

                $recs = Record::where('course_id', $round->course_id)->where('total', $num)->where('type', 'Par')->where('status', 1)->get();

                foreach ($recs as $rec) {
                    $rec->delete();
                }

                $record = new Record();
                $record->user_id = Auth::id();
                $record->course_id = $round->course_id;
                $record->tee_id = $round->tee_id;
                $record->type = $round->type;
                $record->total = $round->total;
                $record->date = $round->date;
                $record->par_id = $round->par_id;
                $record->round_id = $round->id;
                $record->status = 1;

                $record->save();

            }

        }

        return Redirect::back()->with('success', 'Din runda är nu aktiv och låst.');
    }

    public function records(){
        $records = Record::where('status', 1)->orderBy('date', 'desc')->paginate(15);

        return View::make('round.records', compact('records'));
    }

}
