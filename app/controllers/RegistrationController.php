<?php

class RegistrationController extends \BaseController {

	public function create()
	{
        return View::make('users.create');
	}

	public function store(){       // validate the info, create rules for the inputs

        $user = new User;
        $user->username =  Input::get('username');
        $user->password = Input::get('password');
        $user->email = Input::get('email');
        $user->save();

        $profile = new Profile;
        $profile->phone = Input::get('phone');
        $profile->adress = Input::get('adress');
        $profile->info = Input::get('info');

        $profile->save();

        $user->profile()->save($profile);

        return Redirect::to('/login')->withFlashMessage('User created! You can now login.');

	}


}
