<?php

class DiscController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function user($id){

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $id = Input::get('bag_id');
		$disc = New disc();

        $disc->name = Input::get('name');
        $disc->author = Input::get('author');
        $disc->plastic = Input::get('plastic');
        $disc->weight = Input::get('weight');
        $disc->condition = Input::get('condition');
        $disc->bag_id = Input::get('bag_id');
        $disc->mixed = $disc->condition . ' ' .$disc->plastic . ' ' . $disc->name . ' ' . $disc->weight . 'g';

        $disc->save();
        $bag = Bag::whereId($id)->firstOrFail();
        $sum = Disc::where('bag_id', $id)->count();
        $bag->discs = $sum;

        $bag->save();

        return Redirect::back()->with('success', 'Disc Added to Bag!');

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
