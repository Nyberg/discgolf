<?php

class AdminController extends \BaseController {

	public function rounds(){
        $rounds = Round::get();
        return View::make('admin.rounds', compact('rounds'));
    }

    public function index()
    {
        $id = Auth::User()->id;
        $user = User::with('profile')->whereId($id)->firstOrFail();
        $rounds = Round::where('user_id', $id)->count();
        return View::make('admin.index', ['user'=>$user, 'rounds'=>$rounds]);
    }

    public function dashboard(){
        return View::make('admin.dashboard');
    }

    public function settings(){
        return View::make('admin.settings');
    }

    public function users(){

        $users = User::with('roles')->get();

        return View::make('admin.users', ['users'=>$users]);

    }

    public function clubs(){

        $clubs = Club::get();

        return View::make('admin/clubs', ['clubs'=>$clubs]);

    }

    public function clubOwners(){

        $clubs = Club::get();
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'ClubOwner');
        })->get();

        return View::make('admin.clubsowner', ['users'=>$users]);

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
		//
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
