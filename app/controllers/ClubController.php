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
        $club->image = '/img/dg/header.jpg';

        $club->save();

        return Redirect::to('/dashboard')->with('success', 'Klubb tillagd!');

	}

	public function show($id)
	{
		$club = Club::with('course')->whereId($id)->firstOrFail();
        $news = News::where('club_id', $id)->orderBy('created_at', 'desc')->get();
        $members = User::with('profile')->where('club_id', $id)->orderBy('created_at', 'asc')->get();
        $num = User::where('club_id', $id)->count();
        return View::make('club.show', ['club'=>$club, 'news'=>$news, 'members'=>$members, 'num'=>$num]);
	}

	public function edit($id)
	{
        $user = User::whereId(Auth::user()->id)->firstOrFail();

        if($user->club_id == $id || Auth::user()->hasRole('Admin')){
            $club = Club::whereId($id)->firstOrFail();

            return View::make('club/edit', ['club'=>$club]);
        }else {
            return Redirect::to('/')->with('danger', 'Du har inte behörighet för detta.');
        }
	}

	public function update($id)
	{
		$club = Club::whereId($id)->firstOrFail();
        $old = Club::whereId($id)->firstOrFail();

        if($club){

            $club->name = Input::get('name');
            $club->country = Input::get('country');
            $club->state = Input::get('state');
            $club->city = Input::get('city');
            $club->website = Input::get('website');
            $club->information = Input::get('information');


            if(Input::hasFile('file')) {

                try {
                    $file = Input::file('file');
                    $filepath = '/img/headers/';
                    $filename = time() . '-club.png';
                    $file = $file->move(public_path($filepath), ($filename));
                    $club->image = $filepath.$filename;

                }
                catch(Exception $e) {
                    return 'Något gick snett mannen: ' .$e;
                }
            }

            $club->save();

            $img = Image::make(public_path($club->image));

            $img->save();

            $img->destroy();

            if($old->image == '/img/dg/header.jpg'){

            }else{
                File::delete(public_path().$old->image);
            }

            return Redirect::back()->with('success', 'Klubb '.$club->name.' uppdaterad!');

        }else{

            return Redirect::back()->with('danger', 'Något gick snett..');
        }
	}

    public function clubCourses($id){

        $club = Club::with('course')->whereId($id)->firstOrFail();

        return View::make('club.courses', ['club'=>$club]);

    }

	public function destroy($id)
	{
		$club = Club::whereId($id)->firstOrFail();

        $club->delete();

        return Redirect::back()->with('success', 'Klubb '.$club->name.' borttagen!');
	}


}
