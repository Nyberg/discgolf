<?php

class ShotController extends \BaseController {

	public function index()
	{

	}

	public function create($round_id, $id)
    {
        $hole = Hole::with('score')->whereId($id)->firstOrFail();

        if ($hole->check == 0) {
            return Redirect::back()->with('headsup', 'There is no hole image overview to support that action.');

        } else {

            $total = Score::where(['round_id' => $round_id, 'hole_id' => $id])->pluck('score');
            $discs = Disc::where('bag_id', Auth::user()->id)->orderBy('name', 'asc')->lists('mixed', 'id');

            return View::make('shot.add', ['hole' => $hole, 'total' => $total, 'round_id' => $round_id, 'discs' => $discs]);
        }
    }

    /**
     * @return mixed
     */
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
            $shot->disc_id = Input::get('disc-'.$i.'');
            $shot->save();

        };

        $shot = new Shot();
        $shot->round_id = Input::get('round_id');
        $shot->user_id = Auth::User()->id;
        $shot->hole_id = Input::get('hole_id');
        $shot->x = Input::get('last-x');
        $shot->y = Input::get('last-y');
        $shot->disc_id = Input::get('last-disc');
        $shot->number = $number;

        $shot->save();

        $score = Score::where(['round_id'=>$shot->round_id, 'hole_id'=>$shot->hole_id])->firstOrFail();
        $score->score_added = 1;
        $score->save();

        $round = Round::whereId($shot->round_id)->firstOrFail();

        return Redirect::to('/round/'.$shot->round_id.'/edit/'.$round->course_id)->with('success', 'Throws added!');
	}

	public function show($id, $round_id)
	{
        $shots = Shot::with('disc')->where(['round_id'=>$round_id,'hole_id'=>$id])->get();

        if(!$shots->isEmpty()){

            $round = Round::whereId($round_id)->firstOrFail();

            $score = Score::with('hole')->where('hole_id', $id)->firstOrFail();

            return View::make('shot.show', ['shots' => $shots, 'score' => $score, 'round' => $round]);



        }else {
            return Redirect::back()->with('danger', 'There is not shots added to this hole..');

        }
	}

	public function edit($round_id, $hole_id)
    {

        $round = Round::whereId($round_id)->firstOrFail();
        $hole = Hole::with('score')->whereId($hole_id)->firstOrFail();

        if ($hole->check == 0) {

            return Redirect::back()->with('headsup', 'There is no hole image overview to support that action.');

        } else {

            $shots = Shot::where('hole_id', $hole_id)->get();
            $discs = Disc::whereBag_id(Auth::user()->id)->orderBy('name', 'asc')->lists('mixed', 'id');

            foreach ($shots as $shot) {

                $shot = Shot::whereId($shot->id)->firstOrFail();
                $shot->delete();
            };

            $total = Score::where(['round_id' => $round_id, 'hole_id' => $hole_id])->pluck('score');

            return View::make('shot.edit', ['hole' => $hole, 'total' => $total, 'round' => $round, 'discs' => $discs]);
        }
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
