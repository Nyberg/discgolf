<?php

use dg\Tours\RemoveTourCommand;
use dg\Tours\PostTourCommand;
use dg\Tours\UpdateTourCommand;

class TourController extends \BaseController {

	public function index()
	{
		$tours = Tour::get();

        return View::make('tour.index', ['tours'=>$tours]);
	}

    public function admin(){

        $tours = Tour::get();

        return View::make('admin.tour', ['tours'=>$tours]);
    }

	public function create()
	{
		$clubs = Club::lists('name', 'id');
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();

        return View::make('tour.create', ['clubs'=>$clubs, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}

	public function store()
	{
        $name = Input::get('name');
        $rounds = Input::get('rounds');
        $date = Input::get('date');
        $information = Input::get('information');
        $club_id = Input::get('club');
        $country_id = Input::get('country');
        $state_id = Input::get('state');
        $city_id = Input::get('city');

		$command = new PostTourCommand(
            $name,
            $rounds,
            $date,
            $information,
            $club_id,
            $country_id,
            $state_id,
            $city_id
        );

        $this->CommandBus->execute($command);

        return Redirect::to('/dashboard')->with('success', 'Tävling sparad!');
	}

	public function show($id)
	{
		$tour = Tour::whereId($id)->firstOrFail();

        return View::make('tour.show', ['tour'=>$tour]);
	}

	public function edit($id)
	{
		$tour = Tour::whereId($id)->firstOrFail();
        $clubs = Club::lists('name', 'id');
        return View::make('tour.edit', ['tour'=>$tour, 'clubs'=>$clubs]);
	}


	public function update($id)
	{
        $tour = Tour::whereId($id)->firstOrFail();

        $id = $tour->id;
        $name = Input::get('name');
        $rounds = Input::get('rounds');
        $date = Input::get('date');
        $club_id = Input::get('club');
        $information = Input::get('information');

        $command = new UpdateTourCommand(
            $id,
            $name,
            $rounds,
            $date,
            $club_id,
            $information
        );

        $this->CommandBus->execute($command);

        return Redirect::to('/dashboard')->with('success', 'Tävling uppdaterad!');
	}

	public function destroy($id)
	{
		$tour = Tour::whereId($id)->first();

        if(Auth::user()->club_id == $tour->club_id && Auth::user()->hasRole('ClubOwner') || Auth::user()->hasRole('Admin')){

            $id = $tour->id;
            $command = new RemoveTourCommand($id);
            $this->CommandBus->execute($command);

            return Redirect::back()->with('success', 'Tävlingen borttagen!');
        }else{
            return Redirect::back()->with('danger', 'Du kan inte ta bort detta!');
        }
	}
}
