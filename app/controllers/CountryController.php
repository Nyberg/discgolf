<?php

class CountryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();

        return View::make('admin.location', ['countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
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
        $type = Input::get('type');

        if($type == 'Country'){

            $country = New country;
            $country->country = Input::get('name');
            $country->save();

            return Redirect::back()->with('success', 'Land '. $country->country . ' tillagt!');
        }
        if($type == 'State'){

            $state = New state;
            $state->state = Input::get('name');
            $state->save();

            return Redirect::back()->with('success', 'Landskap '. $state->state . ' tillagt!');
        }
        if($type == 'City'){

            $city = New city;
            $city->city = Input::get('name');
            $city->save();

            return Redirect::back()->with('success', 'Stad '. $city->city . ' tillagt!');
        }
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
        $type = Input::get('type');

		if($type == 'country'){

            $country = Country::find($id);
            $country->delete();

            return Redirect::back()->with('success', 'Land '. $country->country . ' borttagen!');
        }
        if($type == 'state'){

            $state = State::find($id);
            $state->delete();

            return Redirect::back()->with('success', 'Landskap '. $state->state . ' borttagen!');
        }
        if($type == 'city'){

            $city = City::find($id);
            $city->delete();

            return Redirect::back()->with('success', 'Stad '. $city->city . ' borttagen!');
        }
	}


}
