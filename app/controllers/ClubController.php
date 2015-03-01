<?php

class ClubController extends \BaseController {

	public function index()
	{
        $clubs = Club::all();
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();

        return View::make('club.index', ['clubs'=>$clubs, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}

	public function create()
	{
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
		return View::make('club.create', ['countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}

	public function store()
	{
		$club = new Club;
        $club->name = Input::get('name');
        $club->country_id = Input::get('country');
        $club->state_id = Input::get('state');
        $club->city_id = Input::get('city');
        $club->website = Input::get('website');
        $club->information = Input::get('information');
        $club->membership = Input::get('membership');

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

        $club->save();

        $group = new ForumGroup;

        $group->title = $club->name;
        $group->author_id = Auth::id();
        $group->desc = 'Klubbforum. Endast klubbens medlemmar kan se detta.';
        $group->club_id = $club->id;

        $group->save();

        return Redirect::to('/dashboard')->with('success', 'Klubb tillagd!');

	}

	public function show($id)
	{
		$club = Club::with('course', 'users')->whereId($id)->firstOrFail();
        $news = News::where('club_id', $id)->orderBy('created_at', 'desc')->limit(5)->get();
        $mosts = News::where('club_id', $id)->orderBy('views', 'desc')->limit(3)->get();
		$users = User::where('club_id', $id)->limit(18)->get();

        return View::make('club.show', ['club'=>$club, 'users'=>$users, 'news'=>$news, 'mosts'=>$mosts]);
	}

	public function edit($id)
	{
        $user = User::whereId(Auth::user()->id)->firstOrFail();

        $countries = Country::get();
        $states = State::get();
        $cities = City::get();

        if($user->club_id == $id || Auth::user()->hasRole('Admin')){
            $club = Club::whereId($id)->firstOrFail();

            return View::make('club/edit', ['club'=>$club,'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
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
            $club->country_id = Input::get('country');
            $club->state_id = Input::get('state');
            $club->city_id = Input::get('city');
            $club->website = Input::get('website');
            $club->information = Input::get('information');
            $club->membership = Input::get('membership');


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

    public function clubUsers($id){

        $club = Club::with('users')->whereId($id)->firstOrFail();

        return View::make('club.users', ['club'=>$club]);
    }

	public function destroy($id)
	{
		$club = Club::whereId($id)->firstOrFail();

        $club->delete();

        return Redirect::back()->with('success', 'Klubb '.$club->name.' borttagen!');
	}


}
