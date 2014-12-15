<?php

class ScoreController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function create()
	{
        $x = Input::get('id');
        $id = (int)$x;


        if(is_null($id)){
            return Redirect::to('round/add')->with('danger', 'Something went wrong!');
        }else {
       $course = Course::with('hole')->where('id', $id)->firstOrFail();

      //  $holes = Hole::where('course_id', $course_id)->lists('number', 'id');

		return View::make('score.create', ['course'=>$course]);
            }
	}

	public function store()
	{
        $number = Input::get('course_number');
       // $course_id = Input::get('course_id');
        $id = Input::get('round_id');
        $total = 0;

        for($i = 1; $i <= $number; $i++){

            $score = new Score();

            $score->round_id = Input::get('round_id');
            $score->user_id = Auth::User()->id;
            $score->hole_id = Input::get('number-'.$i.'');
            $score->total = Input::get('score-'.$i.'');
            $x = Input::get('score-'.$i.'');

            $total = (int)$total + (int)$x;
            $score->save();

        };

        $round = Round::whereId($id)->firstOrFail();
        $round->total = $total;
        $round->save();

        return Redirect::to('/course');
	}




	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$score = Score::with('hole')->whereId($id)->firstOrFail();

        return View::make('score.edit', ['score'=>$score]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $round_id = Input::get('round_id');

            $score = Score::whereId($id)->firstOrFail();

            $score->score = Input::get('score');
            $score->save();

            $round = Round::whereId($round_id)->firstOrFail();
            $total = Score::where('round_id', $round_id)->sum('score');

        $round->total = $total;
        $round->save();

        return Redirect::to('/admin');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
