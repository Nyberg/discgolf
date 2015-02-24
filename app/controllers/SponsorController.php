<?php

class SponsorController extends \BaseController {

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
		return View::make('sponsor.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$sponsor = new Sponsor();

        $sponsor->name = Input::get('name');
        $sponsor->user_id = Auth::user()->id;
        $sponsor->url = Input::get('url');
        $sponsor->views = 0;
        $sponsor->clicks = 0;

        if(Input::hasFile('file')) {

            try
            {
                $file = Input::file('file');

                $filepath = '/img/Dg/';
                $filename = time() . '-sponsor.jpg';

                $file = $file->move(public_path($filepath), ($filename));
                $sponsor->image = $filepath.$filename;
            }
            catch(Exception $e)
            {
                return 'Något gick snett mannen: ' .$e;
            }

            $sponsor->save();

            return Redirect::to('/dashboard')->with('success', 'Sponsor added!');
        }


	}

	public function show()
	{
		$sponsors = Sponsor::where('user_id', Auth::id())->get();

        return View::make('sponsor.show', ['sponsors'=>$sponsors]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $sponsor = Sponsor::whereId($id)->firstOrFail();

        return View::make('sponsor.edit', ['sponsor'=>$sponsor]);
	}

    public function redirect($id){

        $sponsor = Sponsor::whereId($id)->firstOrFail();

        $sponsor->clicks++;

        $sponsor->save();

        $url = $sponsor->url;

        return Redirect::to($url);
    }
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $sponsor = Sponsor::whereId($id)->firstOrFail();

        if($sponsor){

        $sponsor->name = Input::get('name');
        $sponsor->user_id = Auth::user()->id;
        $sponsor->url = Input::get('url');

            if(Input::hasFile('file')) {

            try
            {
                $file = Input::file('file');

                $filepath = '/img/Dg/';
                $filename = time() . '-sponsor.jpg';

                $file = $file->move(public_path($filepath), ($filename));
                $sponsor->image = $filepath.$filename;
            }
            catch(Exception $e)
            {
                return 'Något gick snett mannen: ' .$e;
            }

            $sponsor->save();

            return Redirect::to('/dashboard')->with('success', 'Sponsor updated!');
        }else{
                $sponsor->save();
                return Redirect::to('/dashboard')->with('success', 'Sponsor updated!');
            }
        }else{
            return Redirect::back()->with('danger', 'Something went wrong!');
        }

    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $sponsor = Sponsor::whereId($id)->firstOrFail();

        $sponsor->delete();
        return Redirect::back()->with('success', 'Sponsor deleted!');
	}


}
