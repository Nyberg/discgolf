<?php

use dg\Forms\LoginForm;

class SessionController extends \BaseController {

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
            return Redirect::intended('/')->with('success', 'Du är nu inloggad. Välkommen!');
        }

        return Redirect::back()->withInput()->with('danger', 'Dina uppgifter stämde inte..');
    }

    public function destroy($id = null)
    {
        Auth::logout();
        return Redirect::to('/')->with('success', 'Du är utloggad!');
    }


}
