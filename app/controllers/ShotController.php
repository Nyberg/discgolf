<?php

class ShotController extends \BaseController {

	public function index()
	{

	}

	public function create($round_id, $id)
	{
		$hole = Hole::with('score')->whereId($id)->firstOrFail();

        $total = Score::where(['round_id'=> $round_id, 'hole_id'=>$id])->pluck('score');

        return View::make('shot.add', ['hole'=>$hole, 'total'=>$total, 'round_id'=>$round_id]);
	}

	public function store()
	{
        $number = Input::get('total');

        for($i = 1; $i < $number; $i++){

            $shot = new Shot();
            $shot->round_id = Input::get('round_id');
            $shot->user_id = Auth::User()->id;
            $shot->hole_id = Input::get('hole_id');
            $shot->x = Input::get('x-'.$i.'');
            $shot->y = Input::get('y-'.$i.'');
            $shot->number = Input::get('number-'.$i.'');

            $shot->save();

        };

        $shot = new Shot();
        $shot->round_id = Input::get('round_id');
        $shot->user_id = Auth::User()->id;
        $shot->hole_id = Input::get('hole_id');
        $shot->x = Input::get('last-x');
        $shot->y = Input::get('last-y');
        $shot->number = $number;

        $shot->save();
        return Redirect::to('/dashboard')->with('success', 'Throws added!');
	}

	public function show($id, $round_id)
	{
        $score = Score::with('hole')->where('hole_id', $id)->firstOrFail();
        $round = Round::whereId($round_id)->firstOrFail();
        $shots = Shot::where('hole_id', $id)->get();

        return View::make('shot.show', ['shots'=>$shots, 'score'=>$score, 'round'=>$round]);
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}


}
