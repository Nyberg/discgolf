<?php

class TeeController extends \BaseController {

	public function index()
	{
		//
	}

	public function create($id)
	{
		$course = Course::whereId($id)->firstOrFail();

        return View::make('tee.create', ['course'=>$course]);

	}

	public function store()
	{
		$tee = New tee;

        $tee->course_id = Input::get('course_id');
        $tee->color = Input::get('color');
        $tee->holes = Input::get('holes');
        $tee->status = 0;
        $tee->save();

        return Redirect::to('/admin/course')->with('success', 'Tee tillagd');
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
        $tee = Tee::with('hole')->whereId($id)->firstOrFail();

        return View::make('tee.edit', ['tee'=>$tee]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $tee = Tee::whereId($id)->firstOrFail();

        $tee->color = Input::get('color');
        $tee->holes = Input::get('holes');

        $tee->save();

        return Redirect::back()->with('success', 'Tee uppdaterad!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tee = Tee::whereId($id)->firstOrFail();
        $tee->delete();

        $holes = Hole::where('tee_id', $id)->get();
        foreach($holes as $hole){
            $hole->delete();
        }



        return Redirect::back()->with('success', 'Tee borttagen');

	}

    public function getTeepads(){

            $tees = Tee::where('course_id', Input::get('id'))->get();

            return Response::json($tees);
    }


}
