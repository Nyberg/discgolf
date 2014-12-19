<?php

use dg\Forms\UserSettingsForm;

class UserController extends \BaseController {

    /**
     * @var UserSettingsForm
     */
    private $userSettingsForm;

    public function __construct(UserSettingsForm $userSettingsForm){

        $this->userSettingsForm = $userSettingsForm;
    }

	public function index()
	{
		$users = User::with('profile')->get();

        return View::make('users.users', ['users'=>$users]);
	}

	public function adminshow($id)
	{
        $user = User::with('profile')->whereId($id)->firstOrFail();
        return View::make('users.profile')->withUser($user);

	}

    public function show($id)
    {
        $user = User::with('profile')->whereId($id)->firstOrFail();
        $rounds = Round::with('course')->where('user_id', $id)->get();

        return View::make('users.show', ['user'=>$user, 'rounds'=>$rounds]);

    }


	public function edit($id)
	{
        $roles = Role::lists('name', 'id');
        $user = User::with('profile')->whereId($id)->firstOrFail();

        return View::make('users/edit_user', ['user'=>$user, 'roles'=>$roles]);
	}

	public function update($id){

        if(Auth::User()->id == $id || Auth::user()->hasRole('Admin')){

        $check = Input::get('country');

        $role_id = Input::get('role');

            if(!empty($role_id)){

                $user = User::whereId($id)->firstOrFail();
                $role = Role::whereId($role_id)->firstOrFail();

                $user->roles()->detach();
                $user->roles()->attach($role);

                return Redirect::to('/admin/users')->with('success', 'Permission changed!');

            }

            if(!empty($check)){

                $user = User::with('profile')->whereId($id)->firstOrFail();

                $user->profile->phone = Input::get('phone');
                $user->profile->country = Input::get('country');
                $user->profile->state = Input::get('state');
                $user->profile->city = Input::get('city');
                $user->profile->club = Input::get('club');
                $user->profile->website = Input::get('website');
                $user->profile->info = Input::get('info');


                $user->profile->save();

                return Redirect::to('/dashboard')->with('success', 'Profile updated!');

            }

            $this->userSettingsForm->validate($input = Input::only('username', 'email'));

            $user = User::whereId($id)->firstOrFail();
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->metric = Input::get('metric');
            $user->save();

            return Redirect::to('/dashboard')->with('success', 'Settings updated!');
        }
        return Redirect::back()->withFlashMessage('You cant edit that!');
    }



	public function destroy($id)
	{
	}


}
