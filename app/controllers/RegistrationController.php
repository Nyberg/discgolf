<?php

use dg\Forms\RegistrationForm;
use dg\Mailer\ActivationEmail;

class RegistrationController extends \BaseController {

    private $registrationForm;
    /**
     * @var ActivationEmail
     */
    private $activationEmail;

    public function __construct(RegistrationForm $registrationForm, ActivationEmail $activationEmail){

        $this->registrationForm = $registrationForm;
        $this->activationEmail = $activationEmail;
    }


    public function create()
	{

        $clubs = Club::get();

        return View::make('users.create', ['clubs'=>$clubs]);
	}

	public function store(){

        $this->registrationForm->validate($input = Input::all());

        $role = Role::where('name','User')->firstOrFail();

        $user = new User;
        $user->first_name =  Input::get('first_name');
        $user->last_name =  Input::get('last_name');
        $user->password = Input::get('password');
        $user->email = Input::get('email');
        $user->image = '/img/avatar.png';

        if(Input::get('club') == 0){
            $user->club_id = 3;
        }else{
            $user->club_id = Input::get('club');
        }

        $user->save();

        $profile = new Profile;
        $profile->image = '/img/dg/header.jpg';
        $profile->save();

        $user->roles()->attach($role);

        $user->profile()->save($profile);

        $this->activationEmail->activate($user);

        return Redirect::to('/login')->withFlashMessage('User created! You can now login.');

	}


}
