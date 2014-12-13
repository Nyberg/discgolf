<?php

use dg\Forms\LoginForm;

class SessionController extends \BaseController {

    /**
     * @var LoginForm
     */
    private $loginForm;

    public function create()
    {
            return View::make('session.create');
    }

    public function __construct(LoginForm $loginForm){

        $this->loginForm = $loginForm;
    }


    public function store()
    {

        $this->loginForm->validate($input = Input::only('email', 'password'));

        if(Auth::attempt($input))
        {
            return Redirect::intended('/admin');
        }

        return Redirect::back()->withInput()->withFlashMessage('Dina inloggninsuppgifter stämde inte.');
    }



    public function destroy($id = null)
    {
        Auth::logout();
        return Redirect::to('/login')->withFlashMessage('You are successfully logged out!');

    }


}
