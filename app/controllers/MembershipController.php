<?php

class MembershipController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
    public function store($id)
    {
        $club = Club::find($id);
        $user = User::find(Auth::id());

        $request = New membership;

        $request->club_id = $club->id;
        $request->user_id = $user->id;

        $request->save();

        return Redirect::back()->with('headsup', 'Din förfrågan är skickad!');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function accept($user_id, $club_id)
	{
		$user = User::find($user_id);

        $user->club_id = $club_id;
        $user->save();

        $mem = Membership::where('user_id', $user->id)->firstOrFail();

        $mem->delete();

        return Redirect::back()->with('success', 'Ansökan accepterad!');
	}

    public function deny($user_id){

        $mem = Membership::where('user_id', $user_id)->firstOrFail();

        $mem->delete();

        return Redirect::back()->with('headsup', 'Ansökan nekad!');
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
