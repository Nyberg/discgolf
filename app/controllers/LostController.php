<?php

class LostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$losts = Lost::get();

        return View::make('lost.index', ['losts'=>$losts]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $id = Auth::id();

        $discs = Disc::where('user_id', $id)->lists('name');
        $courses = Course::where('status', 1)->lists('name', 'id');

        return View::make('lost.create', ['discs'=>$discs, 'courses'=>$courses]);
	}

	public function store()
	{
		$lost = New lost;

        $lost->user_id = Auth::id();
        $lost->course_id = Input::get('course');
        $lost->type = Input::get('type');
        $lost->status = Input::get('status');
        $lost->date = Input::get('date');

        $lost->save();

        return Redirect::to('/lost-and-found')->with('success', 'Disc tillagd. May the force be with you!');
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
