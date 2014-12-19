<?php

class ClubController extends \BaseController {

	public function index()
	{
        $clubs = Club::all();

        return View::make('club.index', ['clubs'=>$clubs]);
	}

	public function create()
	{
		return View::make('club.create');
	}

	public function store()
	{
		$club = new Club;
        $club->name = Input::get('name');
        $club->country = Input::get('country');
        $club->state = Input::get('state');
        $club->city = Input::get('city');
        $club->website = Input::get('website');
        $club->information = Input::get('information');

        $club->save();

        return Redirect::to('/clubs');

	}

	public function show($id)
	{
		$club = Club::whereId($id)->firstOrFail();

        return View::make('club.show', ['club'=>$club]);
	}

	public function edit($id)
	{
		$club = Club::whereId($id)->firstOrFail();

        return View::make('club/edit', ['club'=>$club]);
	}

	public function update($id)
	{
		$club = Club::whereId($id)->firstOrFail();

        if($club){


            $club->name = Input::get('name');
            $club->country = Input::get('country');
            $club->state = Input::get('state');
            $club->city = Input::get('city');
            $club->website = Input::get('website');
            $club->information = Input::get('information');

            $club->save();

            return Redirect::back()->with('success', 'Club updated successfully!');

        }else{

            return Redirect::back()->with('danger', 'Something went wrong..');
        }
	}

	public function destroy($id)
	{
		$club = Club::whereId($id)->firstOrFail();

        $club->delete();

        return Redirect::back()->with('success', 'Club deleted!');
	}


}
