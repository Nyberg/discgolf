<?php


use dg\Mailer\ActivationEmail;
use dg\Mailer\AlfaEmail;
use dg\Mailer\NotificationEmail;

class ActivationController extends \BaseController {

    /**
     * @var AlfaEmail
     */
    private $alfaEmail;
    /**
     * @var ActivationEmail
     */
    private $activationEmail;
    /**
     * @var NotificationEmail
     */
    private $notificationEmail;

    public function __construct(AlfaEmail $alfaEmail, ActivationEmail $activationEmail, NotificationEmail $notificationEmail){

        $this->alfaEmail = $alfaEmail;
        $this->activationEmail = $activationEmail;
        $this->notificationEmail = $notificationEmail;
    }
	public function index()
	{
		$activations = Registration::get();

        return View::make('admin.activate', ['activations'=>$activations]);
	}

    public function sendAlfa($id){

        $user = Registration::whereId($id)->firstOrFail();

        $token = $user->activation->token;

        $this->alfaEmail->sendAlfa($user, $token);

        $user->activated = 1;
        $user->save();

        return Redirect::back()->with('success', 'Inbjudan skickad');

    }

    public function activation($token, $id){

        $setToken = Activation::where('user_id', $id)->firstOrFail();

        $token = Activation::where('token', $token)->firstOrFail();

        if($setToken == $token){


            $activation = Activation::whereUserId($id)->firstOrFail();

            $role = Role::where('name', 'User')->firstOrFail();

            $user = new User;
            $user->first_name = $activation->first_name;
            $user->last_name = $activation->last_name;
            $user->password = $activation->password;
            $user->email = Input::get('email');
            $user->image = '/img/avatar.png';
            $user->club_id = 1000000;
            $user->activated = 0;

            $user->save();

            $profile = new Profile;
            $profile->image = '/img/dg/header.jpg';
            $profile->country_id = 1;
            $profile->state_id = Input::get('state');
            $profile->city_id = Input::get('city');
            $profile->save();

            $activation = new Activation;
            $activation->user_id = $user->id;
            $activation->token = $this->generateRandomString();
            $activation->status = 0;
            $activation->save();

            $user->roles()->attach($role);

            $user->profile()->save($profile);

            return Redirect::to('/login')->with('success', 'Ditt konto är aktiverad och du kan nu logga in!');

        }else{
            return Redirect::to('/')->with('danger', 'Din token stämde inte.');
        }

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
	public function store()
	{
		$alfa = new Registration;

        $alfa->email = Input::get('email');
        $alfa->first_name = Input::get('name');

        $alfa->save();

        $activation = new Activation;
        $activation->token = $this->generateRandomString();
        $activation->user_id = $alfa->id;
        $activation->save();


        $this->activationEmail->activate($alfa);
        $this->notificationEmail->sendMail($alfa);

        return Redirect::back()->with('success', 'Din anmälan är nu skickad!');

	}


    public function generateRandomString($length = 50)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
