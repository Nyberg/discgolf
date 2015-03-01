<?php

use dg\Forms\UserSettingsForm;
use dg\Forms\ChangePasswordForm;
use dg\Notification\NotificationFetcher;
use dg\statistics\Stat;
use Khill\Lavacharts\Lavacharts;

class UserController extends \BaseController {

    private $userSettingsForm;
    private $stat;
    private $changePasswordForm;

    public function __construct(Stat $stat, UserSettingsForm $userSettingsForm, ChangePasswordForm $changePasswordForm){
        $this->userSettingsForm = $userSettingsForm;
        $this->stat = $stat;
        $this->changePasswordForm = $changePasswordForm;
    }

	public function index()
	{
        $users = User::paginate(15);
        $clubs = Club::get();

        return View::make('users.users',compact('users'), ['clubs'=>$clubs]);
	}

	public function adminshow($id)
	{
        $user = User::with('profile')->whereId($id)->firstOrFail();
        return View::make('users.profile')->withUser($user);

	}

    public function show($id)
    {

        $user = User::with('profile')->whereId($id)->firstOrFail();

        $rounds = Round::with('tee')->where('user_id', $id)->where('status', 1)->orWhere('par_id', $id)->limit(5)->get();
        $club = Club::whereId($user->club_id)->firstOrFail();
        $bags = Bag::with('disc')->where('user_id', $id)->get();
        $sponsors = Sponsor::where('user_id', $id)->get();
        $fetcher = new NotificationFetcher($user);
        $notifications = $fetcher->take(5)->fetch();

        foreach ($sponsors as $sponsor) {
            $sponsor->views++;
            $sponsor->save();
        }

        $user->views++;
        $user->save();

        return View::make('users.show', ['user' => $user, 'rounds' => $rounds, 'club' => $club, 'bags' => $bags, 'notifications'=> $notifications]);
    }


	public function edit($id)
	{
        $roles = Role::lists('name', 'id');
        $user = User::with('profile')->whereId($id)->firstOrFail();
        $clubs = Club::lists('name', 'id');
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        return View::make('users/edit_user', ['user'=>$user, 'roles'=>$roles, 'clubs'=>$clubs, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}

	public function update($id){

        if(Auth::User()->id == $id || Auth::user()->hasRole('Admin')){
        $check = Input::get('country');
            $old = User::with('profile')->whereId($id)->firstOrFail();
            $role = Role::where('name', 'ClubOwner')->firstOrFail();

            if(!empty($check)){

                $user = User::with('profile')->whereId($id)->firstOrFail();


                $user->profile->phone = Input::get('phone');
                $user->profile->country_id = Input::get('country');
                $user->profile->state_id = Input::get('state');
                $user->profile->location = Input::get('location');
                $user->profile->city_id = Input::get('city');
                $user->profile->club_id = Input::get('club');
                $user->profile->website = Input::get('website');
                $user->profile->info = Input::get('info');

                $user->profile->save();

                return Redirect::back()->with('success', 'Profil uppdaterad!');

            }else {

                $this->userSettingsForm->validate($input = Input::only('username', 'email'));

                $user = User::whereId($id)->firstOrFail();
                $user->first_name = Input::get('first_name');
                $user->last_name = Input::get('last_name');
                $user->email = Input::get('email');
                $user->metric = Input::get('metric');
                $user->club_id = Input::get('club');

                if(Input::hasFile('file')) {

                    try
                    {
                        $file = Input::file('file');
                        $filepath = '/img/user/';
                        $filename = time() . '-user-'.$user->first_name.'.jpg';
                        $file = $file->move(public_path($filepath), ($filename));
                        $user->image = $filepath.$filename;
                        $img = Image::make(public_path($user->image))->resize(180,180);
                        $img->save();

                        $img->destroy();

                        if($old->image == '/img/avatar.png'){

                        }else{
                            File::delete(public_path().$old->image);
                        }
                    }
                    catch(Exception $e)
                    {
                        return 'Något gick snett mannen: ' .$e;
                    }
                }

                $user->save();

                return Redirect::back()->with('success', 'Inställningar uppdaterade!');
            }
        }
        return Redirect::back()->withFlashMessage('Du kan inte redigera detta!');
    }

    public function addRole($id){

        $user = User::whereId($id)->firstOrFail();
        $roles = Role::lists('name', 'id');
        return View::make('admin.roles', ['roles'=>$roles, 'user'=>$user]);

    }

    public function password(){

        return View::make('users/password');

    }



    public function changePassword()
    {

        $this->changePasswordForm->validate($input = Input::all());

        $user = User::find(Auth::user()->id);

        $old_password = Input::get('current');
        $password = Input::get('new');

        if (Hash::check($old_password, $user->password)) {

            $user->password = $password;
            $user->save();

            if ($user->save()) {

                return Redirect::to('/dashboard')->with('success', 'Your password has been changed!');
            }

        }else{

            return Redirect::back()->with('danger', 'Your old password is incorrect.');
        }

        return Redirect::back()->with('danger', 'Something went wrong..');
}

	public function destroy($id)
	{

    }

    public function userRound($id){

        $user = User::find($id);
        $rounds = Round::where('user_id', $id)->orWhere('par_id', $id)->paginate(15);

        return View::make('round.user', compact('rounds'), ['user'=>$user]);
    }


    public function getPlayers()
    {
        $users = User::get();

        return Response::json($users);
    }
}
