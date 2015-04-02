<?php

class LostController extends \BaseController {

	public function index()
	{
		$losts = Lost::where('solved', 0)->orderBy('date', 'desc')->get();

        return View::make('lost.index', ['losts'=>$losts]);
	}

    public function user($id){

        $losts = Lost::where('user_id', $id)->where('solved', 0)->get();
        $solveds = Lost::where('user_id', $id)->where('solved', 1)->get();

        return View::make('lost.user', ['losts'=>$losts, 'solveds'=>$solveds]);

    }

    public function markSolved($id){

        $lost = Lost::find($id);

        if($lost->user_id == Auth::id()){

        $lost->solved = 1;

        $lost->save();

        return Redirect::back()->with('success', 'Fallet är markerat som löst!');

        }else{
            return Redirect::back()->with('danger', 'Du kan inte utföra detta!');
        }
    }

	public function create()
	{
        $id = Auth::id();

        $discs = Disc::where('user_id', $id)->get();
        $courses = Course::where('status', 1)->get();

        return View::make('lost.create', ['discs'=>$discs, 'courses'=>$courses]);
	}

	public function store()
	{
		$lost = new Lost;

        $lost->user_id = Auth::id();
        $lost->course_id = Input::get('course');
        $lost->status = Input::get('status');
        $lost->date = Input::get('date');
    #   $lost->hole_id = Input::get('hole');
        $lost->solved = 0;

        if(Input::get('status') == 'lost'){
            $lost->type = Input::get('type_lost');
        }else{
            $lost->type = Input::get('type_found');
        }

        $lost->save();

        return Redirect::to('/lost-and-found')->with('success', 'Disc tillagd. May the force be with you!');
	}

	public function show($id)
	{
		//
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
