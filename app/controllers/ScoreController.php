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

	public function create($id, $tee_id)
	{
        $tee = Tee::with('hole')->where('id', $tee_id)->firstOrFail();
        $round = Round::whereId($id)->firstOrFail();

        return View::make('score.create', ['tee'=>$tee, 'round'=>$round]);
    }


	public function store()
	{
        $number = Input::get('course_number');
        $id = Input::get('round_id');

        for($i = 1; $i <= $number; $i++){

            $score = new Score();
            $score->round_id = Input::get('round_id');
            $score->user_id = Auth::User()->id;
            $score->hole_id = Input::get('hole-'.$i.'');
            $score->score = Input::get('score-'.$i.'');
            $score->par = Input::get('par-'.$i.'');
            $score->score_added = 0;
            $score->save();

        };

        $total = Score::where('round_id', $id)->sum('score');

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

        $shots = Shot::where(['round_id'=>(int)$round_id, 'hole_id'=>$score->hole_id])->get();

        if($shots){

        foreach($shots as $shot){

            $shot = Shot::whereId($shot->id)->firstOrFail();
            $shot->delete();

            $score = Score::whereId($id)->firstOrFail();
            $score->score_added = 0;
            $score->save();

        }

        }

        return Redirect::to('/account/round/'.$round_id.'/edit/'.$round->course_id.'')->with('success', 'Score updated!');
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

    public function getScore(){

        $holes = Hole::where('tee_id', Input::get('id'))->get();

        return Response::json($holes);

    }


}
