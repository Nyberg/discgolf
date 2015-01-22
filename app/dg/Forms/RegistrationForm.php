<?php

namespace dg\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator{

    protected $rules = [
        'first_name'=>  'required|alpha',
        'last_name' =>  'required|alpha',
        'email'     =>  'required|email',
        'password'  =>  'required|min:6',
        'terms'     =>  'required'

    ];

}