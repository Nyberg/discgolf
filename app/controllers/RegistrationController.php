<?php

class RegistrationController extends \BaseController {

	public function create()
	{
        return View::make('users.create');
	}

	public function store(){       // validate the info, create rules for the inputs

        $role = Role::where('name','User')->firstOrFail();

        $user = new User;
        $user->first_name =  Input::get('first_name');
        $user->last_name =  Input::get('last_name');
        $user->password = Input::get('password');
        $user->email = Input::get('email');
        $user->save();

        $profile = new Profile;
        $profile->save();

        $user->roles()->attach($role);

        $user->profile()->save($profile);

        return Redirect::to('/login')->withFlashMessage('User created! You can now login.');

	}


}
