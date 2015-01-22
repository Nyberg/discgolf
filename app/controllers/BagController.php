<?php

class BagController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bags = Bag::with('user')->get();

        return View::make('bag.index', ['bags'=>$bags]);
	}

    public function user($id){

        $bags = Bag::with('disc')->where('user_id', $id)->get();

        return View::make('bag.user', ['bags'=>$bags]);

    }

	public function create()
	{
		return View::make('bag.add');
	}

	public function store()
	{
		$bag = New bag();

        $bag->type = Input::get('type');
        $bag->user_id = Auth::user()->id;

        $bag->save();

        return Redirect::to('/user/'.Auth::user()->id.'/bags')->with('success', 'Bag created successfullty!');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bag = Bag::whereId($id)->firstOrFail();

        return View::make('bag.show', ['bag'=>$bag]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bag = Bag::with('disc')->whereId($id)->firstOrFail();

        return View::make('bag.edit', ['bag'=>$bag]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {

		$bag = Bag::whereId($id)->firstOrFail();

        $bag->type = Input::get('type');
        $bag->save();

        return Redirect::to('/user/'.Auth::user()->id.'/bags')->with('success', 'Bag updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $bag = Bag::whereId($id)->firstOrFail();
        $bag->delete();

        return Redirect::to('/user/'.Auth::user()->id.'/bags')->with('success', 'Bag ' . $bag->type . ' deleted!');
	}


}
