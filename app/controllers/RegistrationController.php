<?php

use dg\Forms\RegistrationForm;
use dg\Mailer\ActivationEmail;
use dg\Mailer\NotificationEmail;

class RegistrationController extends \BaseController
{

    private $registrationForm;
    private $activationEmail;
    private $notificationEmail;

    public function __construct(RegistrationForm $registrationForm, ActivationEmail $activationEmail, NotificationEmail $notificationEmail)
    {

        $this->registrationForm = $registrationForm;
        $this->activationEmail = $activationEmail;
        $this->notificationEmail = $notificationEmail;
    }

    public function alfa(){
        return View::make('users.alfa');
    }

    public function create($token)
    {
        if($token){

        $setToken = Activation::whereToken($token)->firstOrFail();
        if($setToken->token == $token){

            $clubs = Club::orderBy('name', 'asc')->get();
            $cities = City::orderBy('city', 'asc')->get();
            $states = State::orderBy('state', 'asc')->get();
            $countries = Country::orderBy('country', 'asc')->get();

            return View::make('users.create', ['clubs' => $clubs, 'cities' => $cities, 'states' => $states, 'countries' => $countries, 'token'=>$setToken])->with('success', 'Välkommen. Du kan nu skapa en användare!');

        }else{
            return Redirect::to('/')->with('danger', 'Din nyckel är inte giltlig');
        }

        }else{
            return Redirect::to('/')->with('danger', 'Du måste anmäla dig för alfatester innan du kan besöka denna sidan');
        }
    }

    public function store()
    {
        $token_id = Input::get('token_id');
        $token = Activation::whereId($token_id)->firstOrFail();

        if($token){

        $this->registrationForm->validate($input = Input::all());

        $role = Role::where('name', 'User')->firstOrFail();

        $user = new User;
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->password = Input::get('password');
        $user->email = Input::get('email');
        $user->image = '/img/avatar.png';
        $user->club_id = 1;
        $user->activated = 0;
        $user->username = Input::get('first_name') + Input::get('last_name');

        $user->save();

        $profile = new Profile;
        $profile->image = '/img/dg/header.jpg';
        $profile->country_id = 1;
        $profile->state_id = Input::get('state');
        $profile->city_id = Input::get('city');
        $profile->save();


        $user->roles()->attach($role);
        $user->profile()->save($profile);

        $reg = Registration::where('id', $token->user_id)->firstOrFail();

        $reg->delete();
        $token->delete();

        return Redirect::to('/login')->with('success', 'Ditt konto är skapat. Du kan nu logga in!');

        }else{
            return Redirect::back()->with('danger', 'Din nyckel är inte giltligt');
        }

    }



}