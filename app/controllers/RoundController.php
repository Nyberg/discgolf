<?php

class RoundController extends \BaseController {

	public function index()
	{
		$rounds = Round::with('course')->get();

        return View::make('round.index', ['rounds'=>$rounds]);
	}

    public function user_round($id){

        $rounds = Round::with('course')->where('user_id', $id)->get();

        return View::make('round.user_round', ['rounds'=>$rounds]);

    }

    public function admin(){

    }

	public function create()
	{
        $id = Input::get('id');

        if(is_null($id)){
            return Redirect::to('admin/round/add');
        }else {

            $course = Course::with('hole')->where('id', $id)->firstOrFail();

            return View::make('score.create', ['course' => $course]);
        }
	}

    public function getCourse(){

        $courses = Course::lists('name', 'id');

        return View::make('round.create')->with('courses', $courses);
    }

	public function store()
	{
		$round = new Round();
        $round->course_id = Input::get('course_id');
        $round->user_id = Auth::User()->id;
        $round->user = Auth::User()->username;
     // $round->comment = Input::get('comment');
        $round->save();

        $total = 0;
        $number = Input::get('holes');

        for($i = 1; $i <= $number; $i++){

            $score = new Score();

            $score->user_id = Auth::User()->id;
            $score->hole_id = Input::get('number-'.$i.'');
            $score->round_id;
            $score->score = Input::get('score-'.$i.'');
            $score->par = Input::get('par-'.$i.'');
            $x = Input::get('score-'.$i.'');

            $total = (int)$total + (int)$x;

            $score->save();
            $round->score()->save($score);

        };

        $round = Round::whereId($round->id)->firstOrFail();

        $round->total = $total;
        $round->save();

        return Redirect::to('/admin');
	}

	public function show($id, $course_id)
	{
        $round = Round::with('score')->whereId($id)->firstOrFail();
        $course = Course::with('hole')->whereId($course_id)->firstOrFail();

		return View::make('round.show', ['round'=>$round, 'course'=>$course]);
	}


	public function edit($id)
	{
        $round = Round::whereId($id)->firstOrFail();
        $courses = Course::lists('name', 'id');
		return View::make('round.edit', ['round'=>$round, 'courses'=>$courses]);
	}

	public function update($id)
	{
        $round = Round::whereId($id)->firstOrFail();

        if (is_null($round)) {
            return Redirect::route('/admin');
        } else {

            $round = Round::whereId($id)->firstOrFail();
            $round->course_id = Input::get('course');
            $round->comment = Input::get('comment');

            $round->save();

            return Redirect::to('/admin');
        }
	}

	public function destroy($id)
	{
		$round = Round::whereId($id)->firstOrFail();
        $round->delete();

        $scores = Score::where('round_id', $id)->get();

        foreach($scores as $score){
            $score->delete();
        }

        return Redirect::back();
	}


}
